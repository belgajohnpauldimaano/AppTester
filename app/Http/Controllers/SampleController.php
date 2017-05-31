<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function file_input_index () 
    {
        return view('file_uploader.index');
    }

    public function file_upload (Request $request) 
    {
        if ($request->hasFile('photo'))
        {
            //echo "Meron";
             foreach($request->file('photo') as $key => $val)
             {
                //echo $key . ' ';

                $val->move(public_path(''), str_random(5) .'aa.jpg');
            }

            $initialPreview = [
                asset('0aa.jpg')
            ];

            $initialPreviewConfig = [
                ['caption' => "transport-2.jpg", 'size' => 329892, 'width' => "120px", 'url' => route('file_delete'), 'key' => 2, 'extra' => [' _token' => csrf_token() ] ]
            ];
            return response()->json([ 'initialPreview' => $initialPreview, 'initialPreviewConfig' => $initialPreviewConfig, 'initialPreviewThumbTags' => [], 'append' => true]);
        }
        else
        {
            echo "wala";
        }
    }

    public function file_delete (Request $request) 
    {
        $initialPreview = [
            // "".asset('0aa.jpg') ."",
            // "".asset('0aa.jpg') ."",
            // "".asset('0aa.jpg') .""
        ];

        $initialPreviewConfig = [
            //'caption' => "transport-1.jpg", 'size' => 329892, 'width' => "120px", 'url' => "{{ route('file_delete') }}", 'key' => 1, 'extra' => [' _token' => "{{ csrf_token() }}" ] ,
            // ['caption' => "transport-1.jpg", 'size' => 329892, 'width' => "120px", 'url' => route('file_delete'), 'key' => 1, 'extra' => [' _token' => csrf_token() ] ],
            // ['caption' => "transport-2.jpg", 'size' => 329892, 'width' => "120px", 'url' => route('file_delete'), 'key' => 2, 'extra' => [' _token' => csrf_token() ] ]
        ];
        return response()->json([ 'initialPreview' => $initialPreview, 'initialPreviewConfig' => $initialPreviewConfig, 'initialPreviewThumbTags' => [], 'append' => true]);
    }


    public function dropzone_index () 
    {
        return view('dropzone.index');
    }
    public function dropzone_uploader (Request $request)
    {
        if ($request->hasFile('file'))
        {
            $request->file('file')->move(public_path(''),'aa.jpg');
            // foreach($request->file('file') as $key => $val)
            // {
            //     //echo $key . ' ';

            //     $val->move(public_path(''), $key.'aa.jpg');
            // }
            
            return response()->json(['filename' => 'aa.jpg']);
       }
        else
        {
            echo "wala";
        }
    }
}
