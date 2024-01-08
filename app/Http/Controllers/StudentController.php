<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassModel;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Lista elevilor";
        return view('admin.student.list',$data);
    }

    public function add()
    {
        $data['getClass']= ClassModel::getClass();
        $data['header_title'] = "Adauga un elev";
        return view('admin.student.add',$data);
    }
    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);


        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = trim($request->date_of_birth);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->status = trim($request->status);
        $student->save();

        return redirect('admin/student/list')->with('error', "Elevul a fost adaugat cu succes!");

    }
    public function edit($id)
    {
        $data['getRecord']= User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass']= ClassModel::getClass();
            $data['header_title'] = "Editeaza un elev";
            return view('admin.student.edit',$data);
        }
        else
        {
            abort(4040);
        }

    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);


        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = trim($request->date_of_birth);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->admission_date = trim($request->admission_date);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);

        $student->status = trim($request->status);
        $student->save();

        return redirect('admin/student/list')->with('error', "Elevul a fost modificat cu succes!");

    }
    public function delete($id)
    {
        $getRecord= User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $getRecord->is_delete= 1;
            $getRecord->save();
            return redirect('admin/student/list')->with('error', "Elevul a fost sters cu succes!");
        }
        else
        {
            abort(4040);
        }
    }

}
