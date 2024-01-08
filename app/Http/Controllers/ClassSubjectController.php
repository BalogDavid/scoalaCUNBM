<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassSubjectModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;

class ClassSubjectController extends Controller
{


    public function list(Request $request)
    {
        $data['getRecord']= ClassSubjectModel::getRecord();
        $data['header_title']="Atribuirea materilor";
        return view('admin.assign_subject.list',$data);
    }

    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title']="Atribuie o materie unei clase";
        return view('admin.assign_subject.add',$data);
    }
    public function insert(Request $request)
    {
        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id)
            {
                $countAlreadyFirst=ClassSubjectModel::countAlreadyFirst($request->class_id,$request->subject_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new ClassSubjectModel;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
            return redirect('admin/subject/list')->with('success',"Materiile au fost adaugate cu succes clasei");
        }
        else
        {
            return redirect()->back()->with('error','Va rugam incercati din nou');
        }
    }

    public function delete($id)
    {
        $save = ClassSubjectModel::getSingle($id);
        $save->is_delete=1;
        $save->save();

        return redirect()->back()->with('success','Sters cu success');
    }


    public function edit($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title']="Editeaza o materie unei clase";
            return view('admin.assign_subject.edit',$data);
        }
        else
        {
            abort(404);
        }

    }


    public function update(Request $request)
    {
        ClassSubjectModel::deleteSubject($request->class_id);


        if(!empty($request->subject_id))
        {
            foreach($request->subject_id as $subject_id)
            {
                $countAlreadyFirst=ClassSubjectModel::countAlreadyFirst($request->class_id,$request->subject_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new ClassSubjectModel;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }

        }
        return redirect('admin/subject/list')->with('success',"Materiile au fost adaugate cu succes clasei");

    }


    public function edit_single($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord']=$getRecord;
            $data['getClass']= ClassModel::getClass();
            $data['getSubject']=SubjectModel::getSubject();
            $data['header_title']='Editarea Atribuirii Materiilor';
            return view('admin.assign_subject.edit_single',$data);

        }
        else
        {
            abort(404);
        }

    }
}
