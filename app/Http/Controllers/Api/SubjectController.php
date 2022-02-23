<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return response()->json($subjects);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'subject_name' => 'required',
            'subject_code' => 'required'
        ]);

        Subject::insert([
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
            'class_id' => $request->class_id
        ]);
        return response('Subject is inserted');
    }

    public function edit($id){
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
    }

    public function update(Request $request, $id){
        $subject = Subject::findOrFail($id);

        $validate = $request->validate([
            'subject_name' => 'required|unique:subjects',
            'subject_code' =>  'required|unique:subjects'
        ]);

        $subject->update([
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code
        ]);
        return response('Subject is updated');
    }

    public function delete($id){
        Subject::findOrFail($id)->delete($id);
        return response('Subject is deleted');
    }
}
