<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserInfo;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use APP\User;

class UserInfoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        // エロくワント ORマッパー
        $userinfos = UserInfo::all();
        $currentuser = \Auth::user();
        $nickname = $currentuser->name;

        // クエリビルダ
        // $userinfos = DB::table('user_infos')
        // ->select('id', 'nickname', 'created_at')
        // ->orderby('created_at', 'desc')
        // ->get();

        // dd($userinfos);
        // dd($user);

        return view('userinfo.index', compact('userinfos', 'currentuser', 'nickname'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $currentuser = \Auth::user();
        return view('userinfo.create', compact('currentuser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $userinfo = new UserInfo;

        $currentuser = Auth::user();
        $user_id = Auth::id();


        $userinfo->user_id = $user_id;
        $userinfo->nickname = $request->input('nickname');
        $userinfo->whatyouwant = $request->input('whatyouwant');
        $userinfo->whatyougive = $request->input('whatyougive');
        $userinfo->money = $request->input('money');
        $userinfo->time = $request->input('time');
        $userinfo->pusheduserid = 0;

        $userinfo->save();

        return redirect('userinfo/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $userinfo = UserInfo::find($id);
        $currentuser = \Auth::user();

        if($userinfo->money === 0){
            $money = 'はい';
        }
        if($userinfo->money === 1){
            $money = 'いいえ';
        }
        if($userinfo->time === 1){
            $time = '9時~12時';
        }
        if($userinfo->time === 2){
            $time = '12時~15時';
        }
        if($userinfo->time === 3){
            $time = '15時~18時';
        }
        if($userinfo->time === 4){
            $time = '18時~21時';
        }
        if($userinfo->time === 5){
            $time = '21時~24時';
        }
        if($userinfo->time === 6){
            $time = '深夜・早朝';
        }


        return view('userinfo.show', compact('userinfo', 'money', 'time'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $userinfo = UserInfo::find($id);
        $currentuser = \Auth::user();
        return view('userinfo.edit', compact('userinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $userinfo = UserInfo::find($id);
        $currentuser = \Auth::user();

        $userinfo->whatyouwant = $request->input('whatyouwant');
        $userinfo->whatyougive = $request->input('whatyougive');
        $userinfo->money = $request->input('money');
        $userinfo->time = $request->input('time');
     

        $userinfo->save();

        return redirect('userinfo/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $userinfo = UserInfo::find($id);
        $currentuser = \Auth::user();
        $userinfo->delete();

        return redirect('userinfo/index');


    }


    public function originalshow($id)
    {
        //

        $currentuser = \Auth::user();
        $user = User::find($id);

        $usercards = $user->userinfos;
        $students = $user->students;

        // dd($students[0]->studentname);

        

        

        
        return view('userinfo.originalshow', compact('currentuser', 'user', 'usercards', 'students'));


    }
}
