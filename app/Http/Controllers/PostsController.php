<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
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
        if($categories->count() == 0 || $tags->count() == 0)
        {
            Session::flash('info', 'Yo must have some categories and tags before creating a new post.');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        /*
        *
        *Validating Post request
        *
        */
        $this->validate($request,[
            'title'=> 'required|max:255',
            // 'author' => 'required',
            'image' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        //Fetching name of an image and giving it a new name by prefixing time

        $featured = $request->image;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);
        $user_id = Auth::id();
        
        $post = Post::create([
            'title' => $request->title,
            'image' => 'uploads/posts/'.$featured_new_name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => $user_id
        ]);

        $post->tags()->attach($request->tags);
        Session::flash('success', 'Post created successfully!!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('admin.posts.edit')->with('post', $post)
                                        ->with('categories', Category::all())
                                        ->with('tags', Tag::all());
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
        $this->validate($request,[
            'title'=> 'required|max:255',
            'author' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);
        
        $post = Post::find($id);

        if($request->hasFile('image'))
        {
            $featured = $request->image;
            $feature_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $feature_new_name);
            $post->image = $feature_new_name;
        }
        $post->title = $request->title;
        $post->author = $request->author;
        $post->content = $request->content;
        $post->slug = str_slug($request->title);
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post updated successfully!!');

        return redirect()->route('posts');
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
        $post->delete();

        Session::flash('success', "The post was just trashed!!");
        return redirect()->route('posts');
    }

    /**
     * Displays trashed posts
     * 
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        Session::flash('success', 'Post deleted Permanently!!');

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Post restored successfully!!');
        return redirect()->route('posts');
    }
}
