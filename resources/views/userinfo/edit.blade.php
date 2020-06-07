@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">カード情報編集</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    editです
                    <form method="POST" action="{{route('userinfo.update', ['id' => $userinfo->id])}}">
                      <!-- @csrf
                     
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
                      <input type="submit" name="btn_confirm" value="更新する">-->
                      @csrf
            

                        <div class="form-group row">
                            <label for="whatyougive" class="col-sm-4 col-form-label">提供できるスキル</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="whatyougive" placeholder="20文字以内" value="{{$userinfo->whatyougive}}" required>
                                <div class="invalid-feedback">入力してください</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="whatyouwant" class="col-sm-4 col-form-label">求めているスキル</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="whatyouwant" placeholder="20文字以内" value="{{$userinfo->whatyouwant}}" required>
                                <div class="invalid-feedback">入力してください</div>
                            </div>
                        </div>
                
                        
                        

                        
                        <div class="form-group row">
                            <label for="age" class="col-sm-6 col-form-label">金銭のやり取りの無い方とだけ連絡を取りたいですか？</label>
                            <div class="col-sm-6">
                                <input type="radio" name="gender" value="0" class="mt-3" @if($userinfo->gender === 0) checked @endif>はい</input>
                                <input type="radio" name="gender" value="1" class="mt-3" @if($userinfo->gender === 1) checked @endif>いいえ</input>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-sm-4 col-form-label">連絡の取りやすい時間帯</label>
                            <div class="col-sm-8">
                                <select name="age">
                                    <option value="">選択してください</option>
                                    <option value="1">９時~12時</option>
                                    <option value="2">12時~15時</option>
                                    <option value="3">15時~18時</option>
                                    <option value="4">18時~21時</option>
                                    <option value="5">21時~24時</option>
                                    <option value="6">深夜・早朝</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block">登録する</button>
                            </div>
                        </div>
                    
                        </form> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
