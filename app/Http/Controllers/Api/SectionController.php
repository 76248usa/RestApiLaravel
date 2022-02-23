<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Carbon\Carbon;

class SectionController extends Controller
{
    public function index(){
        $sections = Section::all();
        return response()->json($sections);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'section_name' => 'required|unique:sections'
        ]);

        Section::insert([
            'section_name' => $request->section_name,
            'class_id' => $request->class_id,
            'created_at' => Carbon::now()
        ]);
        return response('Section inserted successfully');
    }

    public function edit($id){
        $section = Section::findOrFail($id);
        return response()->json($section);
    }

     public function update(Request $request, $id){

        Section::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name
        ]);
     
        return response('Section is updated');
    }

    public function delete($id){
        Section::findOrFail($id)->delete($id);
        return response('Section deleted successfully');
    }

}
