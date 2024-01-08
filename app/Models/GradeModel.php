<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class GradeModel extends Model
{
    use HasFactory;
    protected $table = 'grade';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('grade.*','users.name as created_by')
            ->join('users','users.id','=','grade.created_by')
            ->where('grade.is_deleted','=',0)
            ->orderBy('grade.id', 'desc')
            ->paginate(50);
    }


}
