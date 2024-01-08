<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\GradeModel;
use Illuminate\Support\Facades\Auth;

class GradeControllerTeacher extends Controller
{
    public function list()
    {
        $data['getRecord'] = GradeModel::getRecord();
        $data['header_title'] = "Lista notelor";
        return view('teacher.grade.list',$data);
    }
    public function add()
    {

        $data['header_title'] = "Adaugare nota noua";
        return view('teacher.grade.add',$data);
    }

    public function insert(Request $request)
    {
        $grade = new GradeModel;
        $grade->student =trim($request->student);
        $grade->name =trim($request->name);
        $grade->grade_number =trim($request->grade_number);
        $grade->created_by = Auth::user()->id;
        $grade->save();
        return redirect('teacher/grade/list')->with('info',"Nota a fost adaugata cu succes!");
    }





    public function edit($id)
    {
        $data['getRecord'] = GradeModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title']= "Editeaza nota";
            return view('teacher.grade.edit',$data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $grade = GradeModel::getSingle($id);
        $grade->student =trim($request->student);
        $grade->name =trim($request->name);
        $grade->grade_number =trim($request->grade_number);
        $grade->save();
        return redirect('teacher/grade/list')->with('info',"Nota a fost actualizata cu succes!");

    }

    public function delete($id)
    {
        $getRecord = GradeModel::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_deleted=1;
            $getRecord->save();
            return redirect('teacher/grade/list')->with('info',"Nota a fost stearsa cu succes!");
        }
        else
        {
            abort(404);
        }

    }
}


