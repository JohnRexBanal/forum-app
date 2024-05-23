<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $post;

    public function __construct()
    {
        $this->post = new Post;
    }

    public function dashboard()
    {
        $posts = $this->post->all();
        
        return view("layouts.app", compact("posts"));
    }
}