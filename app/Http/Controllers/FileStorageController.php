<?php
// Copyright (c) Microsoft Corporation.
// Licensed under the MIT License.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\SupportDoc;
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
      Log::info($doc);
      $path = storage_path('supportDoc/'.$appId ."/". ($doc->new_filename));
      $file = File::get($path);
      $type = File::mimeType($path);

      $response = Response::make($file, 200);
      $response->header("Content-Type", $type);

      return $response;
  }
}