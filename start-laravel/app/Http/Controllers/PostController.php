<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        //  หน้าแรกเเสดงผล
        //      ใช้model Post ในการควบคุม paginate ให้ข้อมูลเเสดงที่ 5 ตัว latest ข้อมูลเรื่มต้น
        
        $data = Post::latest()->paginate(5);
    

        return view('posts.index', compact('data'))
            ->with('i',(request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //การเพิ่มข้อมูล
    return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // การส่งข้อมูลไปยังด้าต้าเบส
        $request->validate([
            'title' => 'required',
            'descript'=>'required'
            


        ]);
        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post creared successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        
        ]);
        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success','Post update  successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
         return redirect()->route('posts.index')
                ->with('success','Post delete successfully');
    }
}
