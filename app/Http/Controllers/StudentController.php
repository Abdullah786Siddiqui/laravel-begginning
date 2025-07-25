<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class StudentController extends Controller
{
    function home()
    {
        return view('pages.home');
    }

    // Create //
    function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:25',
            'email' => 'required|email|unique:students,email,' . $request->id,
            'gender' => 'required',
            'skill' => 'required|array',
            'domain' => 'required'
        ]);

        $validated['skill'] = json_encode($validated['skill']);




        Student::create($validated);
        return redirect()->route('Homepage')->with('success', 'Student has been successfully added.');
    }

    // Read
    function Read()
    {
        $students = Student::all();
        return view('pages.View', compact('students'));
    }

    // Update //
    function UpdateView(int $id)
    {
        $students = Student::find($id);
        return view('pages.Update', compact('students'));
    }

    function Update(int $id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:25',
            'email' => 'required|email|unique:students,email,' . $id,
            'gender' => 'required',
            'skill' => 'required|array',
            'domain' => 'required'
        ]);

        $validated['skill'] = json_encode($validated['skill']);


        $students = Student::find($id);


        $students->update($validated);
        return redirect()->route('ViewPage')->with('success', 'Student has been successfully Updated.');
    }
    // Delete
    function delete(int $id)
    {
        $students = Student::find($id);
        $students->delete();
        return redirect()->route('ViewPage')->with('success', 'Student has been successfully Deleted.');
    }


    // User Api
    function getuser(){
        $response = Http:: get('https://dummyjson.com/users');
        $users = $response->json()['users'];
        print_r($users);
        return view('pages.users',compact('users'));
    }
}
