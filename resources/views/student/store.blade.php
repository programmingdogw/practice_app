@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">リクエスト完了です</div>

                <div class="card-body">
                  <p>リクエストは再度送れますが、連投するのはやめましょう。</p>
                  <p>ユーザー詳細から送ったリクエストが確認できます。</p>
                  <form method="GET" action="{{route('userinfo.index')}}">
                    <button type="submit" class="btn btn-primary">
                        カード一覧に戻る
                    </button>
                  </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection