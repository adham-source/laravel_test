<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Display data after inserted
        $data = User::get();

        return view('users.display', ['user' => $data]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.add', ['title' => 'Added user']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        # Cheched validate data
        $data = $this -> validate($request, [
            'name'      => 'required|min:3|max:15',
            'email'     => 'required|email',
            'password'  => 'required|min:7|max:20' // When used min:8 Erros ??
        ]);

        # Convert password to encrypt
        $data['password'] = bcrypt($data['password']);

        # Inserted data to database
        $sql = User::create($data);

        // if($sql):
        //     echo 'data inserted';
        // else:
        //     echo 'Error in data';
        // endif;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
