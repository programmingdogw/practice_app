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
                <div class="card-header">使い方・メニュー</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            使い方
                            <ul>
                                <li>まずは募集カードであなたの欲しいスキルと提供できるスキルを登録しましょう</li>
                                <li>リクエストを送るとカードの登録者からあなたの連絡先が見えるようになります</li>
                                <li>あなたへのリクエストはマイページから確認できます</li>
                                <li>連絡を取っても良ければ表示されている連絡先に連絡してみましょう</li>
                                <li>zoomやグーグルハングアウトでお互いのスキルを教えあいましょう </li>
                            </ul>
                            グーグルハングアウトとは？
                            <ul>
                                <li><a href="https://apps.google.com/intl/ja/meet/?utm_source=google&utm_medium=cpc&utm_campaign=1008070-googlemeet-apac-jp-ja-bkws-bmm-regular&utm_content=utm_content=text-ad-none-none-DEV_c-CRE_437520833432-ADGP_Hybrid+%7C+AW+SEM+%7C+BKWS+~+EXA+%7C+Hangouts+%7C+%5BM:1%5D+%7C+JP+%7C+JA-KWID_43700053714612214-kwd-414711509166-userloc_1009717-network_g&utm_term=KW_%2B%E3%82%B0%E3%83%BC%E3%82%B0%E3%83%AB%E3%83%8F%E3%83%B3%E3%82%B0%E3%82%A2%E3%82%A6%E3%83%88&gclid=Cj0KCQjwoPL2BRDxARIsAEMm9y-hufC3xnV6Z1Hbsy9Hf0QMVbWuf6pPA_TQpxoZFH_VsrKwmm-T6wMaAp3NEALw_wcB&gclsrc=aw.ds">こちらからご覧ください（外部リンク）</a></li>
                            </ul>
                            注意
                            <ul>
                                <li>連絡先の交換は自己責任となります</li>
                                <li>破棄しても構わないサブアカウント等を使用しましょう。</li>
                                <li>トラブル等に発展しないよう公序良俗に則った使用を心がけてください。</li>
                            </ul>
                            
                        </div>
                        <div class="col-4">
                            メニュー
                            <form method="GET" action="{{route('userinfo.create')}}" class="mt-1">
                                <button type="submit" class="btn btn-primary">
                                    募集カードを作成する
                                </button>
                            </form>

                            <form method="GET" action="{{route('userinfo.originalshow', ['id'=>$currentuser->id])}}" class="mt-2">
                                <button type="submit" class="btn btn-primary">
                                    マイページへ
                                </button>
                            </form>
                        </div>
                    </div>
                 

                    


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
                                        @if($currentuser->id != $userinfo->pusheduserid)
                                            <td>
                                                <form method="POST" action="{{route('student.store', ['id'=>$userinfo->id])}}">
                                                @csrf

                                                <input type="hidden" name="studentname" value="{{$currentuser->name}}">
                                                <input type="hidden" name="studentemail" value="{{$currentuser->email}}">
                                                <input type="hidden" name="studentwant" value="{{$userinfo->whatyougive}}">
                                                <input type="hidden" name="studentgive" value="{{$userinfo->whatyouwant}}">
                                                <input type="hidden" name="user_id" value="{{$userinfo->user_id}}">
                                                <input type="hidden" name="pushedcardid" value="{{$userinfo->id}}">

                                                <input type="submit" name="btn_confirm" value="リクエストする">
                                                </form>
                                            </td>
                                        @else
                                            <td>リクエスト済みです</td>
                                        @endif                                  
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
