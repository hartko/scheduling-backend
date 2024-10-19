<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\TeacherService;
use Illuminate\Support\Facades\Log;
class TeacherController extends Controller
{
   
    protected $teacherService;

    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    /**
     * Endpoint to fetch a list of teacher.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {

            $teachers = $this->teacherService->list($request->input('search'));
            return response()->json([
                'result' => 'success',
                'teachers' => $teachers->getCollection()->makeHidden(['id','departmentId', 'created_at', 'updated_at']),
                'pagination' => [
                    "nextPageUrl"=>$teachers->nextPageUrl(),
                    "previousPageUrl" => $teachers->previousPageUrl(),
                ]
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    } 
    /**
     * Endpoint to create multiple teacher.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function massCreate(Request $request)
    {
        try {
            $saveRooms = $this->teacherService->massCreate($request);
            return response()->json([
                'result' => 'successful',
                'data' => $saveRooms,
                'message' => 'Succesfully created teacher!'

            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }

    }

    public function update($request, $id)
    {
        try {
            $updateRoom = $this->teacherService->update($request);

            return response()->json([
                'result' => 'successful',
                'data' => $updateRoom,
                'message' => 'Succesfully updated teacher!'

            ], 200);


        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    }
}
