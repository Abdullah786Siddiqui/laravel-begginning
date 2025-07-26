<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;





class StudentController extends Controller
{
 



    function formPage()
    {
        return view('pages.create');
    }

    // Create //
    function create(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required|min:3|max:25',
            'email' => 'required|email|unique:students,email',
            'gender' => 'required',
            'skill' => 'required|array',
            'domain' => 'required',
            'image'=>'required|file|mimes:jpg,jpeg,png,pdf,docx|max:2048'
        ]);

        $validated['skill'] = json_encode($validated['skill']);

        $validated['image'] = $request->file('image')->store('images', 'public');


        // ORM //
        Student::create($validated);
        // Query Builder ///
        // DB::table('students')->insert($validated);
        return redirect()->route('createpage')->with('success', 'Student has been successfully added.');
    }

    // Read
    function Read()
    {       // ORM //
        // $students = Student::all();
        // Query Builder ///
        $students = DB::table('students')->get();
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


        // $students = Student::find($id);

        //  ORM //
        // $students->update($validated);
        // Query Builder ///
        DB::table('students')->where('id', $id)->update($validated);
        return redirect()->route('ViewPage')->with('success', 'Student has been successfully Updated.');
    }
    // Delete
    function delete(int $id)
    {
        //  ORM //
        // $students = Student::find($id);
        // $students->delete();
        // Query Builder ///
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('ViewPage')->with('success', 'Student has been successfully Deleted.');
    }


    // User Api
    function getuser()
    {
        $response = Http::get('https://dummyjson.com/users');
        $users = $response->json()['users'];
        print_r($users);
        return view('pages.users', compact('users'));
    }


  
   
}
