@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">トップページテスト中</div>

                <div class="card-body">
                  <ul>
                    <li>登録がお済みでない方は右上のRegisterよりユーザー登録してください</li>
                    <li>アカウントをお持ちの方はログインしてください</li>
                  </ul>
                  <form method="GET" action="{{route('userinfo.index')}}">
                    <button type="submit" class="btn btn-primary">
                        ログイン済みの方はこちら
                    </button>
                  </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
