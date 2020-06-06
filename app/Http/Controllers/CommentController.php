<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;


// クエリビルダ
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //
    public function test(){

        $values = Comment::all();

        // dd($values);

        $comments = DB::table('comments')
        ->select('id')
        ->get();

        dd($comments);

        return view('tests.test', compact('values'));
    }
}
