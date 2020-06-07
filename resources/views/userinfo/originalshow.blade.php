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
                    
                <div class="card-header">「{{$user->name}}」さんの登録したカード一覧</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">名前</th>
                                    <th scope="col">提供できるスキル</th>
                                    <th scope="col">教えて欲しいスキル</th>
                                    <th scope="col">金銭授受を希望しない</th>
                                    <th scope="col">やり取りしたい時間帯</th>
                                </tr>
                            </thead>                    
                            <tbody>
                                @foreach($usercards as $usercard)                                
                                    <tr>
                                        <td>{{ $usercard->nickname}}</td>
                                        <td>{{ $usercard->whatyougive}}</td>
                                        <td>{{ $usercard->whatyouwant}}</td>
                                        <td>
                                            @if($usercard->money == 0)
                                                はい
                                            @else
                                                いいえ
                                            @endif
                                        </td>
                                        <td>
                                            @if($usercard->time ==1)
                                                9時〜12時
                                            @elseif($usercard->time ==2)
                                                12時〜15時
                                            @elseif($usercard->time ==3)
                                                15時〜18時
                                            @elseif($usercard->time ==4)
                                                18時〜21時
                                            @elseif($usercard->time ==5)
                                                21時〜24時
                                            @else
                                                早朝・深夜
                                            @endif
                                        </td>            
                                    </tr>                                                                
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                
                    
                <div class="card-header">「{{$user->name}}」さんのもらったリクエスト一覧</div>
                    <div class="card-body">
                        @if($currentuser->id == $user->id)
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">名前</th>
                                            <th scope="col">連絡先</th>
                                            <th scope="col">この人が習いたいスキル</th>
                                            <th scope="col">この人のスキル</th>
                                            <th scope="col">金銭授受を希望しない</th>
                                            <th scope="col">やり取りしたい時間帯</th>
                                        </tr>
                                    </thead>                    
                                    <tbody>
                                        @foreach($students as $student)                                
                                            <tr>
                                                <td>{{ $student->studentname}}</td>
                                                <th>{{ $student->studentemail}}</th>
                                                <td>{{ $student->studentwant}}</td>
                                                <td>{{ $student->studentgive}}</td>
                                                <td>
                                                    @if($student->cardmoney == 0)
                                                        はい
                                                    @else
                                                        いいえ
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($student->cardtime ==1)
                                                        9時〜12時
                                                    @elseif($student->cardtime ==2)
                                                        12時〜15時
                                                    @elseif($student->cardtime ==3)
                                                        15時〜18時
                                                    @elseif($student->cardtime ==4)
                                                        18時〜21時
                                                    @elseif($student->cardtime ==5)
                                                        21時〜24時
                                                    @else
                                                        早朝・深夜
                                                    @endif
                                                </td>            
                                            </tr>                                                                
                                        @endforeach
                                    </tbody>
                            </table>
                        @else
                            <p>連絡先を見ることができるのはリクエストを受けたユーザーだけです</p>
                        @endif




                        <!-- もらったリクエスト一覧<br>
                        @foreach($students as $student)
                            From:{{$student->studentname}}<br>
                            連絡先:{{$student->studentemail}}<br>
                            生徒が教えて欲しいこと:{{$student->studentwant}}<br>
                            生徒が教えてくれること:{{$student->studentgive}}<br>
                        @endforeach  -->
                    </div>
                </div>





                </div>
            </div>
        </div>
    </div>
</div>

@endsection
