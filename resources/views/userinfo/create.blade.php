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

                    createです

                    <form method="POST" action="{{route('userinfo.store')}}">
                    @csrf

                      ニックネーム
                      <input type="text" name="nickname">
                      <br>
                      提供できるスキル
                      <input type="text" name="whatyougive">
                      <br>
                      欲しいスキル
                      <input type="text" name="whatyouwant">
                      <br>
                      性別
                      <input type="radio" name="gender" value="0">男性</input>
                      <input type="radio" name="gender" value="1">女性</input>
                      <br>
                      年齢
                      <select name="age">
                        <option value="">選択してください</option>
                        <option value="1">~19歳</option>
                        <option value="2">20~29歳</option>
                        <option value="3">30~39歳</option>
                        <option value="4">40~49歳</option>
                        <option value="5">50~59歳</option>
                        <option value="6">60歳~</option>
                      </select>
                      <br>
                      <!-- 連絡に使用するアドレス
                      <input type="email" name="contactemail">
                      <br> -->


                      <input type="submit" name="btn_confirm" value="保存する">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
