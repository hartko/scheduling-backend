<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\CreateSectionRequest;

use App\Http\Services\sectionService;

class SectionController extends Controller
{

    protected $sectionService;

    public function __construct(sectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    /**
     * Endpoint to fetch a list of sections.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {

            $sections = $this->sectionService->list($request->input('search'));

            return response()->json([
                'result' => 'success',
                'data' => $sections
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    }
    /**
     * Endpoint to store a single Section.
     * 
     * @param  \App\Http\Requests\CreateSectionRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateSectionRequest $request)
    {
        try {
            $saveSection = $this->sectionService->store($request);

            return response()->json([
                'result' => 'successful',
                'data' => $saveSection,
                'message' => 'Succesfully created a Section!'

            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    }
    /**
     * Endpoint to create multiple sections.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function massCreate(Request $request)
    {
        try {
            $savesections = $this->sectionService->massCreate($request);

            return response()->json([
                'result' => 'successful',
                'data' => $savesections,
                'message' => 'Succesfully created sections!'

            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }

    }

    public function update(CreateSectionRequest $request, $id)
    {
        try {
            $updateSection = $this->sectionService->update($request);

            return response()->json([
                'result' => 'successful',
                'data' => $updateSection,
                'message' => 'Succesfully updated Section!'

            ], 200);


        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 400);
        }
    }

}
