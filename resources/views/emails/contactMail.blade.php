<h2>Hey !</h2> <br><br>
@foreach($em as $e)
You received an email from : {{ $e->name }} <br><br>

User details: <br><br>

Name:  {{ $e->name }}<br>
Email:  {{ $e->email }}<br>
Phone:  {{ $e->phone }}<br>
Subject:  {{ $e->subject }}<br>
Message:  {!! $e->subject !!}<br><br>
@endforeach
Thanks