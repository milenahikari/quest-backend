<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;
use App\Model\Monitor;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'teach', 'id_city', 'course', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public static function get()
    {
        return User::all();
    }

    public static function getUser($id)
    {
        return User::where('users.id', '=', $id)
            ->get();
    }

    public static function getUserEdit($idUser)
    {
        return User::select(
            'users.name as name',
            'users.email as email',
            'users.course as course',
            'users.photo as photo',
            'users.id_city as id_city',
            'cities.name as city',
            'states.federated_unit as state'
        )
            ->join('cities', 'users.id_city', '=', 'cities.id')
            ->join('states', 'cities.id_state', '=', 'states.id')
            ->where('users.id', $idUser)
            ->get();
    }

    public static function getUserContact($idUser)
    {
        return Monitor::select(
            'monitors.phone',
            'monitors.share_phone as share'
        )
            ->where('monitors.id_user', $idUser)
            ->get();
    }

    public static function getEmail($email)
    {
        $userEmail = User::where('users.email', '=', $email)
            ->get();

        $haveEmail = count($userEmail);
        return response()->json(['registered' => $haveEmail], 200);
    }

    public static function updateDados($idUser, $dados)
    {
        $data = User::findOrFail($idUser);
        $data->name = $dados[0];
        $data->course = $dados[1];
        $data->save();

        return $data;
    }

    public static function updateCity($idUser, $dados)
    {
        $data = User::findOrFail($idUser);
        $data->id_city = $dados[1];
        $data->save();

        return $data;
    }

    public static function updatePassword($idUser, $dados)
    {
        $data = User::findOrFail($idUser);
        if (Hash::check($dados[0], $data->password)) {
            if ($dados[1] == $dados[2]) {
                $data->password = bcrypt($dados[1]);
                $data->save();
                return response()->json(['success'], 200);
            } else {
                return response()->json(['error' => 'Unauthorised'], 401);
            }
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public static function updatePhone($dados)
    {
        $data = Monitor::findOrFail($dados[2]);
        $data->phone = $dados[3];
        $data->share_phone = $dados[4];
        $data->save();

        return $data;
    }
}
