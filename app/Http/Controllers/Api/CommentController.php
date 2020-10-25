<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $msg = $request->session()->pull('msg', '');

        return new JsonResponse([
            'comments' => Comment::with('user')->orderBy('created_at', 'desc')->paginate(5),
            'msg' => $msg,
        ]);
    }

    public function store(Request $request)
    {
        $comment = Comment::create($request->all());
        session(['msg' => '投稿が完了しました']);

        return new JsonResponse(
            $comment,
            JsonResponse::HTTP_CREATED,
            ['meta' => ['message' => '投稿に成功しました']]
        );
    }
}
