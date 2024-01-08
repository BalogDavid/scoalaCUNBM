<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class PresentModel extends Model
{
    use HasFactory;
    protected $table = 'present';

    
    static public function CheckAlreadyAttendance($student_id,$class_id,$attendance_date)
    {
        return self::where('student_id','=',$student_id)->where('student.id','=',$student_id);



}
}