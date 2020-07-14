<?php
// Copyright (c) Microsoft Corporation.
// Licensed under the MIT License.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\SupportDoc;
use App\ApplicationFile;
use File;
use Log;
use Response;

class FileStorageController extends Controller
{
  public function getSupportDoc($appId, $filename)
  {
      if (!session('userName')) 
      {
        abort(401, 'Unauthorized action.');
      }
      $filename = urldecode($filename);
      

      if (!SupportDoc::where([['app_id', '=', $appId], ['original_filename', '=', $filename] ])->exists()) {
          abort(401, 'Unauthorized action.');
      }
      $doc = SupportDoc::where([['app_id', '=', $appId], ['original_filename', '=', $filename] ])->first();
      //Log::info($doc); 
      $path = storage_path('files/'.$appId ."/supportDoc/". ($doc->new_filename));
      $file = File::get($path);
      $type = File::mimeType($path);

      $response = Response::make($file, 200);
      $response->header("Content-Type", $type);

      return $response;
  }

  public function getAppFile($appId, $filename)
  {
      if (!session('userName')) 
      {
        abort(401, 'Unauthorized action.');
      }
      $filename = urldecode($filename);
      

      if (!ApplicationFile::where([['app_id', '=', $appId], ['original_name', '=', $filename] ])->exists()) {
          abort(401, 'Unauthorized action.');
      }
      $doc = ApplicationFile::where([['app_id', '=', $appId], ['original_name', '=', $filename] ])->first();
      //Log::info($doc); 
      $path = storage_path('files/'.$appId ."/appeal/". ($doc->new_name));
      $file = File::get($path);
      $type = File::mimeType($path);

      $response = Response::make($file, 200);
      $response->header("Content-Type", $type);

      return $response;
  }

  public function getLetter($appId, $filename)
  {
      if (!session('userName')) 
      {
        abort(401, 'Unauthorized action.');
      }
      $filename = urldecode($filename);
      

      $path = storage_path('files/'.$appId ."/letter/". $filename);
      $file = File::get($path);
      $type = File::mimeType($path);
      
      //$response = Response::make($file, 200);
      //$response->header("Content-Type", $type);
      $pdf_content = file_get_contents($path);
      //Specify that the content has PDF Mime Type
      header("Content-Type: application/pdf");
      //Display it
      echo $pdf_content;
      /*return response(file_get_contents($path),200)
            ->header('Content-Type',$type);
            */

      //return $response;
  }



}