@extends('layout.app')

@section('app')
     <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
    <h2 class="mb-0 text-left flex-grow-1">Student Information Data</h2>
    <a href="{{route('Homepage')}}" class="btn btn-primary ms-3">Add Student</a>
</div>
  @if (session('success'))
  <div class="alert alert-success">{{session('success')}}</div>       
    @endif
<table class="table">
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Field</th>
      <th scope="col">Skill</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>


    </tr>
  </thead>
  <tbody>
    @foreach ($students as $student )
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->gender}}</td>
            <td>{{$student->domain}}</td>
            <td>{{$student->skill}}</td>
              <td><a  href="{{route('UpdateViewPage',$student->id)}}"  class="btn btn-success">Edit</a></td>
       <td><a href="{{route('Deletepage',$student->id)}}" class="btn btn-danger">Delete</a></td>

        </tr>
    @endforeach
  
  </tbody>
</table>
    
@endsection