<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct() {}

    public function showAll() {
        $posts = Post::all();

        foreach($posts as $post) {
            $post['comments'] = Comment::all()->where('post_id', '--', $post['id'])->values();
        }

        return response()->json($posts, 200);
    }

    public function add(Request $request) {
        $post_title = $request->input("post_title");
        $post_info = $request->input("post_info");

        $post = new Post();
        $post->post_title = $post_title;
        $post->post_info = $post_info;
        $post->save();

        return response()->json($post, 200);
    }

    public function edit(Request $request, $post_id) {
        $post_title = $request->input("post_title");
        $post_info = $request->input("post_info");

        $post = Post::find($post_id);
        $post->post_title = $post_title;
        $post->post_info = $post_info;
        $post->save();

        return response()->json($post, 200);
    }

    public function show($post_id) {
        $post = Post::find($post_id);

        $post['comments'] = Comment::all()->where('post_id', '--', $post_id);

        return response()->json($post, 200);
    }

    public function delete($post_id) {
        $post = Post::find($post_id);
        $post->delete();
        return response()->json(["message" => "Successfull deleted post"], 200);
    }
}
