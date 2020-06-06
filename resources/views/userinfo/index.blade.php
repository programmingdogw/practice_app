@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
                <div class="card-header">使い方</div>

                <div class="card-body">


                    <div>あなたも募集カードを追加しましょう。マッチングするとお互いに連絡先が見られるようになります。
                    </div>

                    <form method="GET" action="{{route('userinfo.create')}}">
                        <button type="submit" class="btn btn-primary">
                            募集カード追加
                        </button>
                    </form>

                    <form method="GET" action="{{route('userinfo.originalshow', ['id'=>$user->id])}}">
                        <button type="submit" class="btn btn-primary">
                            マイページへ
                        </button>
                    </form>


                </div>
            </div>
            <div class="card">
                <div class="card-header">募集カード一覧</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">ニックネーム</th>
                                <th scope="col">提供できるスキル</th>
                                <th scope="col">教えて欲しいスキル</th>
                                <th scope="col">オプション１</th>
                                <th scope="col">オプション２</th>
                            </tr>
                        </thead>                    
                        <tbody>
                            @foreach($userinfos as $userinfo)                                
                                <tr>
                                    <th>{{ $userinfo->id}}</th>
                                    <td>{{ $userinfo->nickname}}</td>
                                    <td>{{ $userinfo->whatyougive}}</td>
                                    <td>{{ $userinfo->whatyouwant}}</td>
                                    @if($user->id == $userinfo->user_id)                                    
                                        <td><a href="{{route('userinfo.edit', ['id'=>$userinfo->id] )}}">編集する</a></td>
                                        <td>
                                            <form method="POST" action="{{route('userinfo.destroy', ['id' => $userinfo->id])}}" id="delete_{{$userinfo->id}}">
                                                @csrf
                                                <a href="#" class="btn btn-danger" data-id="{{$userinfo->id}}" onclick="deletePost(this);" >削除する</a>
                                            </form>
                                            
                                        </td>
                                    @else
                                        <td><a href="{{route('userinfo.originalshow', ['id'=>$userinfo->user_id] )}}">ユーザー詳細へ</a></td>
                                        <td><a href="{{route('userinfo.originalshow', ['id'=>$userinfo->user_id] )}}">リクエストする</a></td>                                    
                                    @endif
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
