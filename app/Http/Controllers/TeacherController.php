<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Str;



class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Lista profesori";
        return view('admin.teacher.list',$data);
    }


    public function add()
    {
        $data['header_title']="Adauga Profesor Nou";
        return view ('admin.teacher.add',$data);
    }

    public function insert(Request $request)
    {
        $teacher=new User;
        $teacher->name=trim($request->name);
        $teacher->last_name=trim($request->last_name);
        $teacher->gender=trim($request->gender);
        $teacher->date_of_birth=trim($request->date_of_birth);
        $teacher->religion=trim($request->religion);
        $teacher->mobile_number=trim($request->mobile_number);
        $teacher->email=trim($request->email);
        $teacher->password=Hash::make($request->password);
        $teacher->user_type=2;
        $teacher->save();
        return redirect('admin/teacher/list')->with('success',"Ai adaugat un profesor cu succes!");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title']= "Editeaza profesor";
            return view('admin.teacher.edit',$data);
        }
        else{
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email'=>'required|email|unique:users,email,'.$id
        ]);
        $teacher= User::getSingle($id);
        $teacher->name=trim($request->name);
        $teacher->last_name=trim($request->last_name);
        $teacher->gender=trim($request->gender);


        $teacher->date_of_birth=trim($request->date_of_birth);
        $teacher->religion=trim($request->religion);
        $teacher->mobile_number=trim($request->mobile_number);
        $teacher->email=trim($request->email);
        $teacher->password=Hash::make($request->password);
        $teacher->user_type=2;
        $teacher->save();
        return redirect('admin/teacher/list')->with('success',"Ai actualizat profesorul!");
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_deleted=1;
            $getRecord->save();
            return redirect()->back()->with('success',"Profesor Sters");
        }
        else
        {
            abort(404);
        }


    }
}
