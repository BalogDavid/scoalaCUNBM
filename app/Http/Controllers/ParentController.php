<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class ParentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getParent();
        $data['header_title'] = "Lista parinti";
        return view('admin.parent.list',$data);
    }


    public function add()
    {
        $data['header_title']="Adauga Parinte Nou";
        return view ('admin.parent.add',$data);
    }

    public function insert(Request $request)
    {
        $parent=new User;
        $parent->name=trim($request->name);
        $parent->last_name=trim($request->last_name);
        $parent->gender=trim($request->gender);


        $parent->date_of_birth=trim($request->date_of_birth);
        $parent->religion=trim($request->religion);
        $parent->mobile_number=trim($request->mobile_number);
        $parent->email=trim($request->email);
        $parent->password=Hash::make($request->password);
        $parent->user_type=4;
        $parent->save();
        return redirect('admin/parent/list')->with('success',"Ai fost adaugat cu succes!");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title']= "Editeaza parinte";
            return view('admin.parent.edit',$data);
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

        $parent= User::getSingle($id);
        $parent->name=trim($request->name);
        $parent->last_name=trim($request->last_name);
        $parent->gender=trim($request->gender);


        $parent->date_of_birth=trim($request->date_of_birth);
        $parent->religion=trim($request->religion);
        $parent->mobile_number=trim($request->mobile_number);
        $parent->email=trim($request->email);
        $parent->password=Hash::make($request->password);
        $parent->user_type=4;
        $parent->save();
        return redirect('admin/parent/list')->with('success',"Ai fost actualizat!");
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_deleted=1;
            $getRecord->save();
            return redirect()->back()->with('success',"Parinte Sters");
        }
        else
        {
            abort(404);
        }


    }
    public function myStudent($id)
    {
        $data['setParent'] = User::getSingle($id);
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getRecord'] =User::getMyStudent($id);
        $data['header_title'] = "Elevi si Parinti";
        return view('admin.parent.my_student', $data);
    }

    public static function AssignStudentParentDelete($student_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id=null;
        $student->save();
        return redirect('admin/parent/list')->with('success',"Asocierea a fost stearsa!");
    }

    public static function AssignStudentParent($student_id,$parent_id)
    {
        $student = User::getSingle($student_id);
        $student->parent_id=$parent_id;
        $student->save();
        return redirect('admin/parent/list')->with('success',"Elevul a fost asociat parintelui!");
    }


public function myStudentParent()
    {
        $id = Auth::user()->id;

        $data['getRecord'] =User::getMyStudent($id);
        $data['header_title'] = "Elevi si Parinti";
        return view('parent.my_student', $data);
    }
}
