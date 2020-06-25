<?php
// Copyright (c) Microsoft Corporation.
// Licensed under the MIT License.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Applicant;
use App\EmailActivatorKey;
use App\Mail\ActivateAccount;
use Log;

class PublicAuthController extends Controller
{
  public function signup(Request $request)
  {
    $name = $request->txtName;
    $email = $request->txtEmail;
    $pass = $request->txtPass;
    $pass2 = $request->txtPass2;

    //validate input
    if(empty($name) || empty($email) || empty($pass) || empty($pass2)){
      if(empty($name))
        $errMsg["name"] = "Please fill in mandatory fields!";
      if(empty($email))
        $errMsg["email"] = "Please fill in mandatory fields!";
      if(empty($pass))
        $errMsg["pass"] = "Please fill in mandatory fields!";
      if(empty($pass2))
        $errMsg["pass2"] = "Please fill in mandatory fields!";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errMsg["email"] = "Email format is not correct!";
    } elseif(Applicant::where([['email', '=', $email]])->exists()){
      $errMsg["email"] ="Email already exist!";
    } elseif(!preg_match("/^[a-zA-Z0-9]{6,}+$/",$pass)){
        $errMsg["pass"] ="Password must contain a minimun of 6 combination of number and alphabets!";
    } elseif($pass != $pass2){
      $errMsg["pass2"] ="Password not same, please retype again!";
    }
    //end validation
    if(!empty($errMsg)){
      $request->flash();
      return view('signUp', ['errMsg' => $errMsg] );
    }
    /*
    Applicant::create([
      'name' => $name,
      'email'  => $email,
      'password' => md5($pass)
    ]);
    */
    $applicant = new Applicant;
    $applicant->name = $name;
    $applicant->email = $email;
    $applicant->password = md5($pass);
    $applicant->status = config('enums.applicantStatus')['PENDING_ACTIVATION'];
    $applicant->save();
    
    //send email for validation
    $uniqueId = uniqid('', true);
    $emailActivatorKey = new EmailActivatorKey;
    $emailActivatorKey->email = $email;
    $emailActivatorKey->purpose = config('enums.emailActPurpose')['ACTIVATION'];
    $emailActivatorKey->validateKey = $uniqueId;
    $emailActivatorKey->save(); 

    Mail::to($email)->send(new ActivateAccount($name, $email, $uniqueId));

    //return view('login')->with('alertMsg', "Your account has been created! Please login using your email/password.");
    return view('login')->with('alertMsg', "Your account has been created! Please check your email to activate your account.");
  }

  public function login(Request $request)
  {
    $email = $request->txtEmail;
    $pass = $request->txtPass;

    $hasRec = Applicant::where([
      ['email', '=', $email],
      ['password', '=', md5($pass)],
    ])->exists();

    //Log::info($applicant);

    if(!$hasRec){
      return view('login')->with('errMsg', "wrong email/password");
    } else{
      $applicant = Applicant::where([
        ['email', '=', $email],
        ['password', '=', md5($pass)],
      ])->first();
      Log::info($applicant);
      session(['userId' => $applicant->id]);
      session(['userName' => $applicant->name]);
      session(['userEmail' => $applicant->email]);
      /*
      $viewData['userId'] = session('userId');
      $viewData['userName'] = session('userName');
      $viewData['userEmail'] = session('userEmail');
      return view('welcome')->with($viewData);
      */
      return view('appForm');
    }
  }

  public function activateAccount(Request $request)
  {
    $email = $request->input('email');
    $actkey = $request->input('actkey');
    //echo "email: ".$email." and actkey: ".$actkey;

    $check = EmailActivatorKey::where([
      ['email', '=', $email],
      ['validateKey', '=', $actkey],
      ['purpose', '=', config('enums.emailActPurpose')['ACTIVATION']],
    ])->exists();

    if($check)
    {
      Applicant::where('email', $email)
          ->update(['status' => config('enums.applicantStatus')['ACTIVE']]);

      $eak = EmailActivatorKey::where([
        ['email', '=', $email],
        ['validateKey', '=', $actkey],
        ['purpose', '=', config('enums.emailActPurpose')['ACTIVATION']],
      ]);
      $eak->delete();
      
      return view('login')->with('alertMsg', "You have successfully activated your email! Please proceed with login.");

    }
    else
    {
      abort(401, 'Unauthorized action.');
    }
  }

  public function signout(Request $request)
  {
      $request->session()->flush();
      return redirect('/');
  }

  public function testMail()
  {
    //abort(401, 'Unauthorized action.');
    Mail::to('sushintai@ncer.com.my')->send(new ActivateAccount('st', 'shintai86@hotmail.com', 'someuniqueid'));
  }
}