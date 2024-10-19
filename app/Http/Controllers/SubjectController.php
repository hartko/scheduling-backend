<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SubjectService;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    //
    protected $subjectService;

    public function __construct(SubjectService $subjectService){
        $this->subjectService = $subjectService;
    }

    public function index(Request $request){
        try{
            $subjects = $this->subjectService->list($request->input('search'));
            return response()->json([
                'result' => 'success',
                'data' => $subjects
            ], 200);
        }catch(\Exception $error){
            return response()->json([
                'status' => 'failed',
                'error' => $error
            ],400);
        }
    }

     /**
     * Endpoint to create multiple subjects.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function massCreate(Request $request)
    {
        try {
            $savesubjects = $this->subjectService->massCreate($request);

            return response()->json([
                'result' => 'successful',
                'data' => $savesubjects,
                'message' => 'Succesfully created subjects!'

            ], 200);
        } catch (\Exception $error) {
            Log::error('Error saving user: ' . $error->getMessage());
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }

    }
}
