<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Course;
use Validator;
use App\Http\Controllers\RatingsController;

class CourseController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 401;

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_category' => 'required',
            'id_monitor' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $data = $request->all();

        $data['title'] = mb_strtoupper($data['title'], 'UTF-8');

        $course = Course::create($data);

        return response()->json(['success' => 'Curso cadastrado com sucesso'], $this->successStatus);
    }

    public function find(Request $request)
    {
        $courses =  Course::serch($request->get('idCity'), $request->get('course'));

        foreach ($courses as $key => $value) {
            $rating = RatingsController::getRating($value->id);
            $value->rating = $rating;
        }
        return $courses;
    }

    public function getCourses($idMonitor)
    {
        $dados = Course::select(
            'categories.id',
            'categories.name',
            'categories.icon',
            'courses.id as id_course',
            'courses.title',
            'courses.description'
        )
            ->join('categories', 'courses.id_category', '=', 'categories.id')
            ->where('courses.id_monitor', $idMonitor)
            ->orderBy('categories.id')
            ->get();

        if (count($dados) > 0) {
            $category = [];
            $idCategory = 0;
            $index = 0;

            foreach ($dados as $key => $value) {
                if ($idCategory == $value['id']) {
                    $category[$index]['category']['courses'][] = [
                        'id'          => $value['id_course'],
                        'title'       => $value['title'],
                        'description' => $value['description']
                    ];
                } else {
                    $category[] = [
                        'category' => [
                            'id'      => $value['id'],
                            'name'    => $value['name'],
                            'icon'    => $value['icon'],
                            'courses' => [[
                                'id'          => $value['id_course'],
                                'title'       => $value['title'],
                                'description' => $value['description']
                            ]]
                        ]
                    ];
                }

                $idCategory = $value['id'];
                $index = $key;
            }

            return $category;
        }
    }

    public function deleteCourse($idCourse)
    {
        return Course::destroy($idCourse);
    }

    public function getCourse($idCourse)
    {
        return Course::getCourse($idCourse);
    }

    public function updateCourse($idCourse, Request $dados)
    {
        return Course::updateCourse($idCourse, $dados);
    }
}
