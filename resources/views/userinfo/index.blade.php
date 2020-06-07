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

                    <form method="GET" action="{{route('userinfo.originalshow', ['id'=>$currentuser->id])}}">
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
                                    @if($currentuser->id == $userinfo->user_id)                                    
                                        <td><a href="{{route('userinfo.edit', ['id'=>$userinfo->id] )}}">編集する</a></td>
                                        <td>
                                            <form method="POST" action="{{route('userinfo.destroy', ['id' => $userinfo->id])}}" id="delete_{{$userinfo->id}}">
                                                @csrf
                                                <a href="#" class="btn btn-danger" data-id="{{$userinfo->id}}" onclick="deletePost(this);" >削除する</a>
                                            </form>
                                            
                                        </td>
                                    @else
                                        <td><a href="{{route('userinfo.originalshow', ['id'=>$userinfo->user_id] )}}">ユーザー詳細へ</a></td>
                                        
                                        <!-- オプション２の部分 -->
                                        <td>
                                            <form method="POST" action="{{route('student.store', ['id'=>$userinfo->id])}}">
                                            @csrf

                                            <input type="hidden" name="studentname" value="{{$currentuser->name}}">
                                            <input type="hidden" name="user_id" value="{{$currentuser->id}}">

                                            <input type="submit" name="btn_confirm" value="リクエストする">
                                            </form>
                                        </td>                                  
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

<!-- ジャバスクリプト -->
<script>

function deletePost(e){
    'use strict';
    if (confirm('本当に削除していいですか？')){
        document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>

@endsection
