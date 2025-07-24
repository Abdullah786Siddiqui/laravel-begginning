@extends('layout.app')


@section('app')
    <h1 class="text-center mt-2">Student Update Data</h1>
  
        <form method="POST" action="{{route('UpdatePage',$students->id)}}" >
        @csrf
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" name="name" value="{{old('name',$students->name)}}" class="form-control" >
    @error('name')
    <div class="text-danger">{{$message}}</div>  
    @enderror
  </div>
  <div class="mb-3">
    <label  class="form-label">Email</label>
    <input type="email" name="email" value="{{old('email',$students->name)}}" class="form-control" >
     @error('email')
    <div class="text-danger">{{$message}}</div>  
    @enderror
  </div>
  <div class="mb-3">
    <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" value="Male" {{$students->gender === "male" ? 'checked' : ''}} >
  <label class="form-check-label" >
    Male
  </label>
</div>
 <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" value="Female" {{$students->gender === "female" ? 'checked' : ''}}>
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
  <option value="Computer Science" {{ $students->domain === "Computer Science" ? 'selected' : '' }}>Computer Science</option>
  <option value="Software Engineering" {{$students->domain === "Software Engineering" ? 'selected' : '' }}>Software Engineering</option>
  <option value="BBA" {{ $students->domain === "BBA" ? 'selected' : '' }}>BBA</option>
</select>

 @error('domain')
    <div class="text-danger">{{$message}}</div>  
    @enderror
</div>

<div class="mb-3">
    @php
     
        $skills = is_array($students->skill) ? $students->skill : json_decode($students->skill, true);
    @endphp

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Javascript" name="skill[]"
            {{ in_array('Javascript', $skills) ? 'checked' : '' }}>
        <label class="form-check-label">Javascript</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Laravel" name="skill[]"
            {{ in_array('Laravel', $skills) ? 'checked' : '' }}>
        <label class="form-check-label">Laravel</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="PHP" name="skill[]"
            {{ in_array('PHP', $skills) ? 'checked' : '' }}>
        <label class="form-check-label">PHP</label>
    </div>
</div>

 @error('skill')
    <div class="text-danger">{{$message}}</div>  
    @enderror
  </div>
  <button type="submit" class="btn btn-success fw-semibold w-100">Update</button>
</form>
@endsection