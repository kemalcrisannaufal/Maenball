<?php

namespace App\Http\Controllers;

use App\Models\NewsComment;
use Illuminate\Http\Request;

class NewsCommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $comment = new NewsComment();
        $comment->fill($request->all());
        $comment->news_id = $id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return redirect()->back();
    }
}
