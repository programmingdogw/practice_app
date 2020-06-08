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
                            <label for="money" class="col-sm-6 col-form-label">金銭のやり取りの無い方とだけ連絡を取りたいですか？</label>
                            <div class="col-sm-6">
                                <input type="radio" name="money" value="1" class="mt-3" @if($userinfo->money === 1) checked @endif>はい</input>
                                <input type="radio" name="money" value="2" class="mt-3" @if($userinfo->money === 2) checked @endif>いいえ</input>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-4 col-form-label">やり取りしたい時間帯</label>
                            <div class="col-sm-8">
                                <select name="time">
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
