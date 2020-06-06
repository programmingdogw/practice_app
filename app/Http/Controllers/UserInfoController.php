<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserInfo;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

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
        $user = \Auth::user();

        // クエリビルダ
        // $userinfos = DB::table('user_infos')
        // ->select('id', 'nickname', 'created_at')
        // ->orderby('created_at', 'desc')
        // ->get();

        // dd($userinfos);
        // dd($user);

        return view('userinfo.index', compact('userinfos', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('userinfo.create');
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

        $user = Auth::user();
        $user_id = Auth::id();


        $userinfo->user_id = $user_id;
        $userinfo->nickname = $request->input('nickname');
        $userinfo->whatyouwant = $request->input('whatyouwant');
        $userinfo->whatyougive = $request->input('whatyougive');
        $userinfo->gender = $request->input('gender');
        $userinfo->age = $request->input('age');
        $userinfo->high_rating = 0;
        $userinfo->low_rating = 0;
        // $contactemail = $request->input('contactemail');

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

        if($userinfo->gender === 0){
            $gender = '男性';
        }
        if($userinfo->gender === 1){
            $gender = '女性';
        }
        if($userinfo->age === 1){
            $age = '~19歳';
        }
        if($userinfo->age === 2){
            $age = '20~29歳';
        }
        if($userinfo->age === 3){
            $age = '30~39歳';
        }
        if($userinfo->age === 4){
            $age = '40~49歳';
        }
        if($userinfo->age === 5){
            $age = '50~49歳';
        }
        if($userinfo->age === 6){
            $age = '60~歳';
        }


        return view('userinfo.show', compact('userinfo', 'gender', 'age'));


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

        // $user = Auth::user();
        // $user_id = Auth::id();


        // $userinfo->user_id = $user_id;
        $userinfo->nickname = $request->input('nickname');
        $userinfo->whatyouwant = $request->input('whatyouwant');
        $userinfo->whatyougive = $request->input('whatyougive');
        $userinfo->gender = $request->input('gender');
        $userinfo->age = $request->input('age');
        // $userinfo->high_rating = 0;
        // $userinfo->low_rating = 0;
        // $contactemail = $request->input('contactemail');

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
        $userinfo->delete();

        return redirect('userinfo/index');


    }


    public function originalshow($id)
    {
        //

        $user = \Auth::user();

        
        return view('userinfo.originalshow', compact('id'));


    }
}