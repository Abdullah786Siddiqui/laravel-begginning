@extends('layout.app')

@section('app')
<h1>Fake Users</h1>
<ul>
@foreach($users as $data)
    <li>{{ $data['firstName']}} ({{ $data['email'] }})</li>
@endforeach
</ul>
    
@endsection