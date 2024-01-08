<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectModel;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord']= SubjectModel::getRecord();
        $data['header_title']="Lista materiilor";
        return view('admin.subject.list',$data);
    }
    public function add()
    {
        $data['header_title']="Adauga o noua materie";
        return view('admin.subject.add',$data);
    }
    public function insert(Request $request)
    {
        $save = new SubjectModel;
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->created_by = Auth::user()->id;
        $save->save();

        return redirect('admin/subject/list')->with('error',"Materia a fost aadugata!");
    }
    public function edit($id)
    {
        $data['getRecord']= SubjectModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title']="Editeza Materia";
            return view('admin.subject.edit', $data);
        }
        else
        {
            abort(404);
        };
    }
    public function update($id, Request $request)
    {
       // dd($request-> all());
        $save = SubjectModel::getSingle($id);
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->save();


        return redirect('admin/subject/list')->with('error',"Materie actualizata cu succes");
    }

    public function delete($id)
    {
        $save = SubjectModel::getSingle($id);
        $save-> is_delete = 1;
        $save->save();


        return redirect('admin/subject/list')->with('error',"Materie stearsa cu succes");
    }

    public function getSubject($id)
    {
        $save = SubjectModel::getSingle($id);
        $save-> is_delete = 1;
        $save->save();


        return redirect('admin/subject/list')->with('error',"Materie stearsa cu succes");
    }
}
