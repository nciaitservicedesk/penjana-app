@extends('emails/masterMail')
@section('mailbody')
Hello <i>{{ $name }}</i>,
<br/>
<p>Thanks for signing up {{ env('APP_NAME') }}, to activate your account please click on the link below:</p>
<p><a href='{{ url('/accActivation').'?email='.urlencode($email).'&actkey='.$actKey }}'>Activation Link</a></p>
<br/><br/><br/>
<p><i>Note: This is a system generated email. Please do not reply to this email. </i></p>
<br/><br/>
@endsection