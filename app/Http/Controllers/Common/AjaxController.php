<?php

namespace App\Http\Controllers\Common;

use DB;
use Exception;
use Validator;

use App\Models\Request as RequestModel;
use App\Models\Mistake;
use App\Models\Feedback;
use App\Http\Controllers\Controller;
use App\Http\Requests\MistakeRequest;
use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\RequestAccessRequest;

use Facades\App\Helpers\File;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
   
    public function mistakeStore(MistakeRequest $request)
    {
        try {
            
            
            DB::transaction(function()  use($request){

                $mistake = Mistake::create($request->all());
                
                if ($request->hasFile('file')) {

                    $file = $request->file('file');
                
                    $filename = time().$file->hashName();

                    $directory =  str_replace('//','/',$mistake->getPhotosDirectory().'/'.$mistake->id);

                    $path = File::put($directory,$file,$filename);

                    $mistake->file = $path;

                    $mistake->update();
                }
            });

            return response()->json([
                'status' => 'success',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => ajax_error_message($e->getMessage())
            ], 200);
        }
    }

    public function feedbackStore(FeedbackRequest $request)
    {
        try {
            $feedback = Feedback::create($request->all());
            
            return response()->json([
                'status' => 'success',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => ajax_error_message($e->getMessage())
            ], 200);
        }
    }

    public function requestAccessStore(RequestAccessRequest $request)
    {
        try {
            if (!auth()->user()->hasApprovedOrganisations()) 
                throw new Exception('У вас нет подтверждённых организаций');

            $requestAccess = RequestModel::create($request->all());

            return response()->json([
                'status' => 'success',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg' => ajax_error_message($e->getMessage())
            ], 200);
        }
    }
   
}
