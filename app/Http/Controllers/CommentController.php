<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct() {}

    public function add(Request $request, $post_id) {
        $comment_text = $request->input("comment_text");

        $comment = new Comment();
        $comment->post_id = $post_id;
        $comment->comment_text = $comment_text;
        $comment->save();

        return response()->json($comment, 200);
    }

    public function delete($comment_id) {
        $comment = Comment::find($comment_id);
        $comment->delete();
        return response()->json(["message" => "Successfull deleted comment"], 200);
    }
}
