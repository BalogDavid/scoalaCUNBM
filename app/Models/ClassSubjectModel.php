<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubjectModel extends Model
{
    use HasFactory;
    protected $table='class_subject';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('class_subject.*','class.name as class_name','subject.name as subject_name','users.name as created_by_name')
            ->join('subject','subject.id','=','class_subject.subject_id')
            ->join('class','class.id','=','class_subject.class_id')
            ->join('users','users.id','=','class_subject.created_by')
            ->where('class_subject.is_delete','=',0)
            ->orderBy('class_subject.id','desc')
            ->paginate(20);


    }

    static public function countAlreadyFirst($class_id,$subject_id)
    {
        return self::where('class_id','=',$class_id)->where('subject_id','=',$subject_id)->first();
    }

    static public function getAssignSubjectID($class_id)
    {
        return self::where('class_id','=',$class_id)->where('is_delete','=',0)->get();
    }

    static public function deleteSubject($class_id)
    {
        return self::where('class_id','=',$class_id)->delete();
    }


}
