<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list()
    {
        $data['getRecord']= ClassModel::getRecord();
        $data['header_title']="Lista claselor";
        return view('admin.class.list',$data);
    }
    public function add()
    {
        $data['header_title']="Adauga o clasa";
        return view('admin.class.add',$data);
    }
    public function insert(Request $request)
    {
        //dd($request->all());
        $save = new ClassModel;
        $save->name = $request->name;
        $save->status = $request->status;

        $save->created_by = Auth::user()->id;
        $save->save();


        return redirect('admin/class/list')->with('error',"Ai creeat o noua clasa!");
    }
    public function edit($id)
    {
        $data['getRecord']= ClassModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title']="Edit Class";
            return view('admin.class.edit', $data);
        }
        else
        {
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        dd($request->all());
//        $save = ClassModel::getSingle($id);
//        $save->name=$request->name;
//        $save->status=$request->status;
//        $save->save();


        return redirect('admin/class/list')->with('error',"Class Successfully Updated");
    }
    public function delete($id)
    {
        $save = ClassModel::getSingle($id);
        $save->is_delete=1;
        $save->save();


        return redirect()->back()->with('error',"Class Successfully Deleted");
    }
}
