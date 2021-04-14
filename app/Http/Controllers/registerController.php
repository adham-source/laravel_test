<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    # To print title page
    public function registerTitle() {
        return view('register', ['titlePage' => 'Register']);
    }

    # Store and check data by request
    public function showData(Request $request) {
        # Validation inputs
        $this -> validate($request , [
            'name'      => 'required|min:3|max:20',
            'age'       => 'required|digits:2',
            'phone'     => 'required|digits:11',
            'password'  => 'required|min:8|max:20',
            'nationalid'=> 'required|digits:14',
            'address'   => 'required|min:10|max:30',
            'aboutme'   => 'required|min:15|max:255',
        ]);

        echo 'Your profile page : <br />';
        echo '<ul>
                <li>My name is : ' . $request -> name . '</li>
                <li>Age is : ' . $request -> age . '</li>
                <li>Phone is : ' . $request -> phone . '</li>
                <li>Natinal ID ' . $request -> nationalid . '</li>
                <li>About Me ' . $request -> aboutme . '</li>
            </ul>';       
        
    }
    
}