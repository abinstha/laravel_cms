<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class FrontEndController extends Controller
{
    public function index()
    {
        
        $latest_category =  Category::orderBy('created_at', 'desc')->first();
        $second_category =  Category::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $thrid_category =  Category::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();

        $category_post1 = $latest_category->posts()->orderBy('created_at', 'desc')->take(3)->get()->all();
        $category_post2 = $second_category->posts()->orderBy('created_at', 'desc')->take(3)->get()->all();
        $category_post3 = $thrid_category->posts()->orderBy('created_at', 'desc')->take(3)->get()->all();

        $post_categories = [$latest_category,  $second_category, $thrid_category];
        $category_posts = [$category_post1, $category_post2, $category_post3];
        // dd($category_posts);

        return view('index')
                        ->with('title', Setting::first()->site_name)
                        ->with('categories', Category::take(5)->get()) //take() is query builder method
                        ->with('latest_post', Post::orderBy('created_at', 'desc')->first())
                        ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                        ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
                        ->with('post_categories', $post_categories)
                        ->with('category_posts', $category_posts)
                        ->with('settings', Setting::first());
    }

    public function single($slug)
    {
        $post = Post::where('slug', $slug)->first();
        
        $next_id = Post::where('id','>', $post->id)->min('id');
        $prev_id = Post::where('id','<', $post->id)->max('id');

        return view('single')
                            ->with('post', $post)
                            ->with('title', $post->title)
                            ->with('tags', Tag::all())
                            ->with('categories', Category::take(5)->get()) //take() is query builder method
                            ->with('settings', Setting::first())
                            ->with('next_post', Post::find($next_id))
                            ->with('prev_post', Post::find($prev_id));
    }

    public function category($id)
    {
        $category = Category::find($id);

        return view('category')
                                ->with('category', $category)
                                ->with('title', $category->name)
                                ->with('categories', Category::take(5)->get())
                                ->with('settings', Setting::first());
    }

    public function tag($id)
    {
        $tag = Tag::find($id);
        // dd($tag);
        return view('tag')
                        ->with('tag', $tag)
                        ->with('title', $tag->tag)
                        ->with('categories', Category::take(5)->get())
                        ->with('settings', Setting::first());
    }
}