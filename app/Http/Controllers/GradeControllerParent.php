<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\GradeModel;
use Illuminate\Support\Facades\Auth;

class GradeControllerParent extends Controller
{
    public function list()
    {
        $data['getRecord'] = GradeModel::getRecord();
        $data['header_title'] = "Lista notelor";
        return view('parent.grade.list',$data);
    }
    
}


