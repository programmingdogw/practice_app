@extends('layouts.app')

@section('content')

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

                    <div>
                        {{$user->name}}さんのページ<br>
                        連絡先：{{$user->email}}<br>
                    </div>

                    <div>
                        @foreach($usercards as $usercard)
                            提供できるスキル:{{$usercard->whatyougive}}<br>
                            教えて欲しいスキル:{{$usercard->whatyouwant}}<br>
                        @endforeach
                    </div>
                    
                    <div>
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

@endsection
