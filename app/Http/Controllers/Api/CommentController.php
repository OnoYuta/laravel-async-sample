<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = Comment::create($request->all());

        return new JsonResponse(
            $comment,
            JsonResponse::HTTP_CREATED,
            ['meta' => ['message' => '投稿に成功しました']]
        );
    }
}
