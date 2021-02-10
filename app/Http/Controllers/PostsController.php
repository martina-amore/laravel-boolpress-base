<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\PostInformation;

use App\Category;

use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newPost = new Post();
        $newPostInfo = new PostInformation();

        $newPost->title = $data['title'];
        $newPost->author = $data['author'];
        $newPost->category_id = $data['category_id'];
        $newPostInfo->description = $data['description'];
        $newPostInfo->slug = '';

        $newPost->save();
        $newPostInfo->post_id = $newPost->id;
        $newPostInfo->save();
        $newPost->tag()->attach($data['tags']);

        return view('posts.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $oldPost = Post::find($id);

        $oldPost->tag()->detach();

        $oldPost->title = $data['title'];
        $oldPost->author = $data['author'];
        $oldPost->category_id = $data['category_id'];
        $oldPost->postInformation->description = $data['description'];
        $oldPost->tag()->attach($data['tags']);

        $oldPost->save();
        $oldPost->postInformation->save();


        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $tags = Tag::all();

      $post->tag()->detach($tags);
      $post->postInformation->delete();
      $post->delete();

      return redirect()->route('posts.index');
    }
}
