<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Student;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    public function store(Request $request){
        // indexからのリクエストを受けてuserに紐づいたstudentテーブルを作る
        $student = new Student;
        $currentuser = Auth::user();
        
        $student->user_id = $request->input('user_id');
        $student->studentname = $request->input('studentname');
        $student->studentemail = $request->input('studentemail');
        $student->studentwant = $request->input('studentwant');
        $student->studentgive = $request->input('studentgive');
        $student->cardmoney = $request->input('cardmoney');
        $student->cardtime = $request->input('cardtime');




        // 押されたカードのスウィッチをonに
        $pushedcard = UserInfo::find($request->input('pushedcardid'));
        $pushedcard->pusheduserid = $currentuser->id;
        // dd($pushedcard);
        
        $student->save();
        $pushedcard->save();

        // return redirect('userinfo/index');
        return view('student.store');
    }
}
