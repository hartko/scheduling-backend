<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Traits\ExcelTrait;
use Illuminate\Support\Facades\Log;

class ExcelController extends Controller
{
    use ExcelTrait;
    public function readExcel(Request $request)
    {
        try {
            if (!$request->hasFile("file")) {
                return response()->json([
                    'result' => $request->body,
                    'error' => 'Please upload file'
                ]);
            }
            $file = $request->file("file");
            $file_name = preg_replace("/[^a-zA-Z]/", "", pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $data = Excel::toArray('Excel', $file);
            $arrayKeys = $this->excelKey(trim($file_name));

            // extract rows
            $rows = array_slice($data[0], 1);
            // Remove null values from the header
            $headers = array_filter($data[0][0], function ($value) {
                return $value !== null;
            });
            $arrayWithoutNull = [];
            $arraysWithNull = [];

            // Use array_filter to iterate through each row and filter out rows with null values
            array_filter($rows, function ($value) use (&$arrayWithoutNull,&$arrayKeys, &$arraysWithNull) {
                if(count($value) !== count($arrayKeys) ){
                    array_splice($value, -(count($value) - count($arrayKeys)));
                }
                if (!in_array(null, $value)) {
                    // If the row doesn't contain null values, add it to the $arrayWithoutNull array
                    $arrayWithoutNull[]= array_combine($arrayKeys, $value);
                }

                $arraysWithNull[] = array_combine($arrayKeys, $value);
            });
            return response()->json([
                'result' => 'success',
                'data' => [
                    'header' => $headers,
                    'arraysWithNull' => $arraysWithNull,
                    'arrayWithoutNull' => $arrayWithoutNull
                ]
            ], 200);

        } catch (\Exception $error) {
            return response()->json([
                'result' => 'failed',
                'error' => $error->getMessage()
            ], 500);
        }


    }
}
