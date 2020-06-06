@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>あなたも情報を登録しましょう。マッチングするとお互いに連絡先が見られるようになります。
                    </div>

                    <form method="GET" action="{{route('userinfo.create')}}">
                      <button type="submit" class="btn btn-primary">
                        新規登録
                      </button>
                    </form>

                    <form method="GET" action="{{route('userinfo.originalshow', ['id'=>$user->id])}}">
                      <button type="submit" class="btn btn-primary">
                        マイページへ
                      </button>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">ニックネーム</th>
                                <th scope="col">提供できるスキル</th>
                                <th scope="col">教えて欲しいスキル</th>
                                <th scope="col">詳細</th>
                            </tr>
                        </thead>                    
                        <tbody>
                            @foreach($userinfos as $userinfo)
                                <tr>
                                    <th>{{ $userinfo->id}}</th>
                                    <td>{{ $userinfo->nickname}}</td>
                                    <td>{{ $userinfo->whatyougive}}</td>
                                    <td>{{ $userinfo->whatyouwant}}</td>
                                    <td><a href="{{route('userinfo.show', ['id'=>$userinfo->id] )}}">詳細を見る</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
