<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\UserInfo;

class StudentController extends Controller
{
    //
    public function store(){
        // indexからのリクエストを受けてuserに紐づいたstudentテーブルを作る

        return redirect('userinfo/index');
    }
}
