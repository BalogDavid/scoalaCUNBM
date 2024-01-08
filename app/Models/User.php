<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    static public function checkEmail($email)
    {
        return self::where('email', '=', $email)->first();
    }
    static public function checkToken($remember_token)
    {
        return self::where('remember_token', '=', $remember_token)->first();
    }
    static public function getAdmin()
    {
        $return =  self::select('users.*')->where('user_type', '=', 1)->where('is_deleted', '=', 0);
            if(!empty(Request::get('name')))
            {
                $return=$return->where('name', 'like', '%'.Request::get('name').'%');
            }
            if(!empty(Request::get('email')))
            {
                $return=$return->where('email', 'like', '%'.Request::get('email').'%');
            }
            if(!empty(Request::get('date')))
            {
                $return=$return->whereDate('create_at', '=', Request::get('date'));
            }
        $return= $return->orderBy('id', 'asc')->paginate(2);

        return $return;
    }
    static public function getParent()
    {
        $return =  self::select('users.*')
            ->where('user_type', '=', 4)
            ->where('is_deleted', '=', 0);


        if(!empty(Request::get('name')))
        {
            $return=$return->where('name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('last_name')))
        {
            $return=$return->where('last_name', 'like', '%'.Request::get('last_name').'%');
        }
        if(!empty(Request::get('gender')))
        {
            $return=$return->where('gender', 'like', '%'.Request::get('gender').'%');
        }
        if(!empty(Request::get('date_of_birth')))
        {
            $return=$return->where('date_of_birth', 'like', '%'.Request::get('date_of_birth').'%');
        }

        if(!empty(Request::get('mobile_number')))
        {
            $return=$return->where('mobile_number', 'like', '%'.Request::get('mobile_number').'%');
        }

        if(!empty(Request::get('email')))
        {
            $return=$return->where('email', 'like', '%'.Request::get('email').'%');
        }
        $return= $return->orderBy('id', 'desc')
            ->paginate(2);

        return $return;
    }
    static public function getTeacher()
    {
        $return =  self::select('users.*')
            ->where('user_type', '=', 2)
            ->where('is_deleted', '=', 0);



        if(!empty(Request::get('name')))
        {
            $return=$return->where('name', 'like', '%'.Request::get('name').'%');
        }
        if(!empty(Request::get('last_name')))
        {
            $return=$return->where('last_name', 'like', '%'.Request::get('last_name').'%');
        }
        if(!empty(Request::get('gender')))
        {
            $return=$return->where('gender', 'like', '%'.Request::get('gender').'%');
        }
        if(!empty(Request::get('date_of_birth')))
        {
            $return=$return->where('date_of_birth', 'like', '%'.Request::get('date_of_birth').'%');
        }

        if(!empty(Request::get('mobile_number')))
        {
            $return=$return->where('mobile_number', 'like', '%'.Request::get('mobile_number').'%');
        }

        if(!empty(Request::get('email')))
        {
            $return=$return->where('email', 'like', '%'.Request::get('email').'%');
        }




        $return= $return->orderBy('id', 'desc')
            ->paginate(2);

        return $return;
    }
    static public function getSearchStudent()
    {
        if(!empty(Request::get('roll_number')) || !empty(Request::get('name')) || !empty(Request::get('last_name')))
        {
            $return =  self::select('users.*', 'class.name as class_name', 'parent.name as parent_name')
                        ->join('users as parent', 'parent.id','=', 'users.parent_id','left')
                        ->join('class','class.id','=','users.class_id','left')
                        ->where('users.user_type', '=', 3)
                        ->where('users.is_deleted', '=', 0);

                        if(!empty(Request::get('roll_number')))
                        {
                            $return=$return->where('users.roll_number', '=', Request::get('roll_number'));
                        }
                        if(!empty(Request::get('name')))
                        {
                            $return=$return->where('users.name', 'like', '%'.Request::get('name').'%');
                        }
                        if(!empty(Request::get('last_name')))
                        {
                            $return=$return->where('users.last_name', 'like', '%'.Request::get('last_name').'%');
                        }

            $return = $return->orderBy('users.id','asc')
                        ->limit(50)
                        ->get();
            return $return;
        }
    }
    static public function getMyStudent($parent_id)
    {
        $return =  self::select('users.*', 'class.name as class_name', 'parent.name as parent_name')
            ->join('users as parent', 'parent.id','=', 'users.parent_id')
            ->join('class','class.id','=','users.class_id','left')
            ->where('users.user_type', '=', 3)
            ->where('users.parent_id', '=', $parent_id)
            ->where('users.is_deleted', '=', 0)
            ->orderBy('users.id','asc')
            ->limit(50)
            ->get();
        return $return;
    }
//    video 19
    static public function getStudent()
    {
        $return =  self::select('users.*')->where('user_type', '=', 3)->where('is_deleted', '=', 0);
        $return= $return->orderBy('id', 'asc')->paginate(2);

        return $return;
    }
//pana aici

    static public function getSingle($id)
    {
        return self::find($id);
    }






}
