<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;

use App\Http\Services\CourseService;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService){
        $this->courseService = $courseService;
    }

 /**
     * Endpoint to fetch a list of courses.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request){
        try{
            $courses = $this->courseService->list($request->input('search'));
            return response()->json([
                'result' => 'success',
                'data' => $courses
            ], 200);
        }catch(\Exception $error){
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    }

    public function massCreate(Request $request){
        try{
            $courses = $this->courseService->massCreate($request);

            return response()->json([
                'status' => 'success',
                'data' => $courses,
                'message' => 'Successfully created courses!'
            ],200);
        }catch(\Exception $error){

            return response()->json([
                'status' => 'failed',
                'error' => $error
            ], 400);
        }
    }
}
