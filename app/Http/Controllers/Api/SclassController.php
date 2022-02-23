<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sclass;

class SclassController extends Controller
{
    public function index(){
        $sclass = Sclass::latest()->get();
        return response()->json($sclass);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'class_name' => 'required|unique:sclasses|max:20'
        ]);

        Sclass::insert([
            'class_name' => $request->class_name,
        ]);
        return response('Student class inserted');
    }

    public function edit($id){
        $sclass = Sclass::findOrFail($id);
        return response()->json($sclass);
    }

    public function update(Request $request, $id){
        $sclass = Sclass::findOrFail($id);

        $validate = $request->validate([
            'class_name' => 'required|unique:sclasses'
        ]);

        $sclass->update([
            'class_name' => $request->class_name
        ]);

        return response('Student class is updated');
    }

    public function delete($id){
        Sclass::findOrFail($id)->delete();

        return response('Class is deleted successfully');
    }
}
