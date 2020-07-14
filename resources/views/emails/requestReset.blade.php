@extends('emails/masterMail')
@section('mailbody')
Hello <i>{{ $name }}</i>,
<br/>
<br/>
<p>You recently requested to reset your password for {{ env('APP_NAME') }} account. Please click on the link below to reset your password</p>
<br/>
<p><a href='{{ url('/resetPass').'/'.urlencode($email).'/'.$actKey }}'>Activation Link</a></p>
<br/><br/><br/>
<p>If you did not request a password reset, please ignore this email. This password reset is only valid for the next 30 minutes.</p>
<br/>
<p><i>Note: This is a system generated email. Please do not reply to this email. </i></p>
<br/><br/>
@endsection