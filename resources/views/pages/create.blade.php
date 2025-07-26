@extends('layout.app')


@section('app')
    <h1 class="text-center mt-2">Student Information Form</h1>
    @if (session('success'))
  <div class="alert alert-success">{{session('success')}}</div>       
    @endif
        <form method="POST" action="{{route('SubmitData')}}" enctype="multipart/form-data" >
        @csrf
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" name="name"  value="{{old('name')}}"class="form-control" >
    @error('name')
    <div class="text-danger">{{$message}}</div>  
    @enderror
  </div>
  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="email" name="email" value="{{old('email')}}" class="form-control" >
     @error('email')
    <div class="text-danger">{{$message}}</div>  
    @enderror
  </div>
  <div class="mb-3">
    <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" value="Male" {{old('gender') === "Male" ? 'checked' : ''}} >
  <label class="form-check-label" >
    Male
  </label>
</div>
 <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" value="Female"  {{old('gender') === "Female" ? 'checked' : ''}}>
  <label class="form-check-label" >
    Female
  </label>
</div>
  @error('gender')
    <div class="text-danger">{{$message}}</div>  
    @enderror
  </div>
  <div class="mb-3">
   <select class="form-select" name="domain">
  <option disabled selected>Select Field</option>
  <option value="Computer Science" {{ old('domain') === "Computer Science" ? 'selected' : '' }}>Computer Science</option>
  <option value="Software Engineering" {{ old('domain') === "Software Engineering" ? 'selected' : '' }}>Software Engineering</option>
  <option value="BBA" {{ old('domain') === "BBA" ? 'selected' : '' }}>BBA</option>
</select>

 @error('domain')
    <div class="text-danger">{{$message}}</div>  
    @enderror
</div>

<div class="mb-3">
    <div class="form-check">
  <input class="form-check-input" type="checkbox" value="Javascript" name="skill[]"  {{ old('skill') === "Javascript" ? 'selected' : '' }} >
  <label class="form-check-label" >
    Javascript
  </label>
</div>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="Laravel" name="skill[]"  {{ old('skill') === "Laravel" ? 'selected' : '' }}>
  <label class="form-check-label" >
    Laravel
  </label>
</div>
 <div class="form-check">
  <input class="form-check-input" type="checkbox" value="PHP" name="skill[]"  {{ old('skill') === "PHP" ? 'selected' : '' }}>
  <label class="form-check-label" >
    PHP
  </label>
</div>
 @error('skill')
    <div class="text-danger">{{$message}}</div>  
    @enderror
  </div>

<div class="mb-3">
  <label for="formFile" class="form-label">Upload Image</label>
  <input class="form-control" type="file" name="image" id="formFile">
</div>
  <button type="submit" class="btn btn-primary fw-semibold w-100">Submit</button>
</form>
<a href="{{route('ViewPage')}}" class="btn btn-success fw-semibold  w-25  mt-2 ">View Data</a>
<a href="{{route('UserPage')}}" class="btn btn-primary fw-semibold  w-25  mt-2 ">User Data</a>


@endsection