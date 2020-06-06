@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  トップページです
                  <br>
                  ログインがお澄みでない方はログインしてください
                </div>

                <div>
                <a href="{{route('userinfo.index')}}">メンターを探す</a>
                <div>
            </div>
        </div>
    </div>
</div>
@endsection
