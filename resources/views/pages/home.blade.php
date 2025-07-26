@extends('layout.app')
@section('app')
 @if (session('success'))
  <div class="alert alert-success">{{session('success')}}</div>       
    @endif
  <!-- Hero Section -->
<div class="container mt-5">
    <div class="p-5 bg-primary text-white rounded shadow-sm text-center">
        <h1 class="display-4">Welcome to Student Management</h1>
        <p class="lead">Manage your students efficiently and effortlessly.</p>
        <a href="{{route('createpage')}}" class="btn btn-light btn-lg mt-3">+ Create New Student</a>
    </div>
</div>

<!-- Info Cards -->
<div class="container mt-5">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Why Use This System?</h5>
                    <p class="card-text">
                        Easily organize, view, and update student records in one centralized system. Ideal for schools and institutions.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Key Features</h5>
                    <ul class="mb-0">
                        <li>Create, Edit, and Delete Students</li>
                        <li>Store fields like skills, domains, and gender</li>
                        <li>Clean & responsive UI</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection