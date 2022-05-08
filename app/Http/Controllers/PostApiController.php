<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostApiController extends Controller
{
    public function index()
    {
        return Post::all();
    }
    public function store()
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        return Post::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);
    }
    public function update(Post $post) {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        
        $test = $post->update([
            'title' => request('title'),
            'content' => request('content'),
        ]);
    
        return [
            'berhasil' => $test
        ];
    }
    public function delete(Post $post) {
        $test = $post->delete();
    
        return [
            'berhasil' => $test
        ];
    }
}
