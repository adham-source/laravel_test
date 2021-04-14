<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blogController extends Controller
{
    // Function print blog info 
    public function blogInfo() {
        return view('displayBlog', [
            'title'     => 'News the world',
            'cat'       => 'ant thing',
            'content'   => 'the good news'
            ]);
        
    }
}
