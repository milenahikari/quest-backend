<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Storage;

class UploadImage extends Model
{
    public static function send($paste, $file, $access = 'public')
    {
        return env('S3_URL') . Storage::disk('s3')->put($paste, $file, $access);
    }
}
