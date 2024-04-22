<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $lastFivePosts = Post::with('category', 'user')->orderBy('id')->limit(5)->get();
        // return $lastFivePosts ; die();
        $category_with_posts = Category::with(['post'=> function($query){
            $query->latest()->limit(2);
        }])->get();
        return view('website.index' ,compact('category_with_posts'));
    }



}
