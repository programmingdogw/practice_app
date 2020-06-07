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
                        @foreach($usercards as $usercard)
                            提供できるスキル:{{$usercard->whatyougive}}<br>
                            教えて欲しいスキル:{{$usercard->whatyouwant}}<br>
                            金銭のやり取りを希望しない:{{$usercard->gender}}<br>
                            やり取りしたい時間帯:{{$usercard->age}}<br>

                        @endforeach
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
