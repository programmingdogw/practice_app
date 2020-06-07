@extends('layouts.app')

@section('content')
<!-- 
indexに編集削除ボタンを移動。userinfoの詳細は見せずにuserページにその他の値と一緒
に載せる予定のためこのページは使わない可能性が高いが一応残している。 
-->
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

                    showです
                    {{$userinfo->nickname}}
                    {{$userinfo->pr}}
                    {{$gender}}
                    {{$age}}
                    


                    <form method="GET" action="{{route('userinfo.edit', ['id' => $userinfo->id])}}">
                    @csrf



                      <input type="submit" name="btn_confirm" value="編集ページへ">
                    </form>



                    <form method="POST" action="{{route('userinfo.destroy', ['id' => $userinfo->id])}}" id="delete_{{$userinfo->id}}">
                        @csrf
                        <a href="#" class="btn btn-danger" data-id="{{$userinfo->id}}" onclick="deletePost(this);" >削除する</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

function deletePost(e){
    'use strict';
    if (confirm('本当に削除していいですか？')){
        document.getElementById('delete_' + e.dataset.id).submit();
    }
}
</script>
@endsection
