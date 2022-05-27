<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BoardController extends Controller
{
    // 리스트 페이지
    public function index()
    {
        $posts = Post::orderby('created_at', 'desc')->get();

        return view('board.index')->with('posts', $posts);
    }

    // 디테일 페이지
    public function show($id)
    {
        $post = Post::find($id);

        return view('board.show')->with('post', $post);
    }

    // 작성 페이지
    public function create()
    {
        return view('board.create');
    }

    // 게시물 db 작성
    public function store(Request $request)
    {

        if(isset(auth()->user()->id)) {
            $validated = $request->validate([
                'title' => 'required|bail',
                'contents' => 'required',
            ]);
           
            $post = new Post;
            $post->user_id = auth()->user()->id;
            $post->title = $request->title;
            $post->contents = $request->contents;
            $post->save();
    
            return redirect('/')->with('flash_message', '게시물이 작성되었습니다.');
        }
        return redirect('/');
    }

    // 수정 페이지
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id == $post->user_id) {
            return view('board.edit')->with('post', $post);
        }
        return redirect('/');
    }

    // 게시물 db 수정
    public function update(Request $request)
    {
        if(isset(auth()->user()->id)) {
            $post = Post::find($request->post_id);
            $post->title = $request->title;
            $post->contents = $request->contents;
            $post->save();

            return redirect('show/'.$request->post_id);
        }
        return redirect('/');
    }

    // 게시물 db 삭제
    public function delete($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id == $post->user_id) {

            $post->delete();

            return redirect('/');
        }
        return redirect('/');

    }
}
