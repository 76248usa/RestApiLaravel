<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function index(){
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request){

        $validate = $request->validate([
            'name' => 'required|unique:students|max:20',
            'email' => 'required|unique:students|max:20'
        ]);

        Student::insert([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
            'created_at' => Carbon::now()

        ]);

        return response('Student added successfully');

    }//End store method

    public function edit($id){
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update(Request $request, $id){

        $student = Student::findOrFail($id);

        $student->update([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
        ]);
        return response('Student updated successfully');

    } //end method

    public function delete($id){
        Student::findOrFail($id)->delete();
        return response('Student deleted successfully');
    }
}
