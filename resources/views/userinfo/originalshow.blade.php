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
                
              
                <div class="card-header">ユーザー情報</div>
                    <div class="card-body">                    
                        ユーザーネーム：{{$user->name}}さんのページ<br>
                        連絡先：{{$user->email}}<br>
                    </div>
                

                    
                <div class="card-header">このユーザーの登録したカード</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">ニックネーム</th>
                                    <th scope="col">提供できるスキル</th>
                                    <th scope="col">教えて欲しいスキル</th>
                                    <th scope="col">金銭授受を希望しない</th>
                                    <th scope="col">やり取りしたい時間帯</th>
                                </tr>
                            </thead>                    
                            <tbody>
                                @foreach($usercards as $usercard)                                
                                    <tr>
                                        <th>{{ $usercard->id}}</th>
                                        <td>{{ $usercard->nickname}}</td>
                                        <td>{{ $usercard->whatyougive}}</td>
                                        <td>{{ $usercard->whatyouwant}}</td>
                                        <td>
                                            @if($usercard->gender == 0)
                                                はい
                                            @else
                                                いいえ
                                            @endif
                                        </td>
                                        <td>
                                            @if($usercard->age ==1)
                                                9時〜12時
                                            @elseif($usercard->age ==2)
                                                12時〜15時
                                            @elseif($usercard->age ==3)
                                                15時〜18時
                                            @elseif($usercard->age ==4)
                                                18時〜21時
                                            @elseif($usercard->age ==5)
                                                21時〜24時
                                            @else
                                                早朝・深夜
                                            @endif
                                        </td>            
                                    </tr>                                                                
                                @endforeach
                            </tbody>
                        </table>

                        <!-- @foreach($usercards as $usercard)
                            提供できるスキル:{{$usercard->whatyougive}}<br>
                            教えて欲しいスキル:{{$usercard->whatyouwant}}<br>
                            金銭のやり取りを希望しない:{{$usercard->gender}}<br>
                            やり取りしたい時間帯:{{$usercard->age}}<br>

                        @endforeach -->
                    </div>
                
                    
                <div class="card-header">このユーザーのもらったリクエスト</div>
                    <div class="card-body">
                        もらったリクエスト一覧<br>
                        @foreach($students as $student)
                            From:{{$student->studentname}}<br>
                            連絡先:{{$student->studentemail}}<br>
                            生徒が教えて欲しいこと:{{$student->studentwant}}<br>
                            生徒が教えてくれること:{{$student->studentgive}}<br>
                        @endforeach
                    </div>
                </div>





                </div>
            </div>
        </div>
    </div>
</div>

@endsection
