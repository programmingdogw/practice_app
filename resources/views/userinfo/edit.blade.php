@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    editです
                    <form method="POST" action="{{route('userinfo.update', ['id' => $userinfo->id])}}">
                      @csrf

                      ニックネーム
                      <input type="text" name="nickname" value="{{$userinfo->nickname}}">
                      <br>
                      提供できるスキル
                      <input type="text" name="whatyougive" value="{{$userinfo->whatyougive}}">
                      <br>
                      欲しいスキル
                      <input type="text" name="whatyouwant" value="{{$userinfo->whatyouwant}}">
                      <br>
                      性別
                      <input type="radio" name="gender" value="0" @if($userinfo->gender === 0) checked @endif>男性
                      <input type="radio" name="gender" value="1" @if($userinfo->gender === 1) checked @endif>女性
                      <br>
                      年齢
                      <select name="age">
                        <option value="">選択してください</option>
                        <option value="1" @if($userinfo->age ===1) selected @endif>~19歳</option>
                        <option value="2" @if($userinfo->age ===2) selected @endif>20~29歳</option>
                        <option value="3" @if($userinfo->age ===3) selected @endif>30~39歳</option>
                        <option value="4" @if($userinfo->age ===4) selected @endif>40~49歳</option>
                        <option value="5" @if($userinfo->age ===5) selected @endif> 50~59歳</option>
                        <option value="6" @if($userinfo->age ===6) selected @endif>60歳~</option>
                      </select>
                      <br>



                      <input type="submit" name="btn_confirm" value="更新する">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
