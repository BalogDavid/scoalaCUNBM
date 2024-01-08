<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\GradeModel;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassModel;
use App\Models\PresentModel;

class PresentController extends Controller
{
    public function AttendanceStudent(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->get('class_id')) && !empty($request->get('attendance_date')))
        {
            $data['getStudent']= User::getStudent($request->get('class_id'));
        }
        
        $data['header_title'] = "Lista prezentelor";
        return view('admin.present.list',$data);
    }
    
    
    public function AttendanceStudentSubmit(Request $request)
    {
        $check_attendance=PresentModel::CheckAlreadyAttendance($request->student_id,$request->class_id,$request->attendance_date);
        $present = new PresentModel;
        $present->student_id =$request->student_id;
        $present->attendance_type =$request->attendance_type;
        $present->class_id =$request->class_id;
        $present->attendance_date =$request->attendance_date;
        $present->created_by =Auth::user()->id;
        $present->save();
        
        $json['message']="Prezenta Salvata";
        echo json_encode($json);
    }
    
    
    
    
    
    /*
    public function add()
    {

        $data['header_title'] = "Adaugare prezenta";
        return view('admin.present.add',$data);
    }

    public function insert(Request $request)
    {
        $grade = new GradeModel;
        $grade->student =trim($request->student);
        $grade->name =trim($request->name);
        $grade->grade_number =trim($request->grade_number);
        $grade->created_by = Auth::user()->id;
        $grade->save();
        return redirect('admin/grade/list')->with('info',"Nota a fost adaugata cu succes!");
    }





    public function edit($id)
    {
        $data['getRecord'] = GradeModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title']= "Editeaza nota";
            return view('admin.grade.edit',$data);
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
            return redirect('admin/grade/list')->with('info',"Nota a fost actualizata cu succes!");
    
    }

    public function delete($id)
    {
        $getRecord = GradeModel::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_deleted=1;
            $getRecord->save();
            return redirect('admin/grade/list')->with('info',"Nota a fost stearsa cu succes!");
        }
        else
        {
            abort(404);
        }
    
    }*/
}



