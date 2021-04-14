<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Show data after inserted
        $data = Member::paginate(25);

        # To display after submit
        return view('members.display', ['member' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # Return to add members
        return view('members.add', ['title' => 'Add Member']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Check validate data before inserted
        $data = $this -> validate($request, [
            'name'      => 'required|min:3|max:15',
            'email'     => 'required|email',
            'password'  => 'required|min:7|max:20' // When used min:8 Erros ??
        ]);

        # Convert password to encrypt
        $data['password'] = bcrypt($data['password']);

        # Inserted data to database
        $sql = Member::create($data);

        // # Check conditional on data inserted or not
        // if($sql):
        //     echo 'data inserted';
        // else:
        //     echo 'Error in data';
        // endif;

        return redirect(url('member')); 
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
        # Fetch data by id
        $data = Member::findOrFail($id);

        # Return page to edit members
        return view('members.edit', ['data' => $data, 'title' => 'Edit Members']);
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
        # Check validate data before updated
        $data = $this -> validate($request, [
            'name'      => 'required|min:3|max:15',
            'email'     => 'required|email',
        ]);
        
        # Query to update data wher id = id
        $sql = Member::where('id', $id) -> update($data);

        # Chech condition on sql
        if($sql):
            echo 'Data updated and inserted';
        else:
            echo 'Some errors in updated';
        endif;


        # Redirect member page after data updated
        return redirect('member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # Query to delete data wher id = id
        $sql = Member::where('id', $id) -> delete();

        # Chech condition on sql
        if($sql):
            echo 'User is deleted';
        else:
            echo 'Some errors in deleted';
        endif;


        # Redirect member page after user deleted
        return redirect('member');
    }


    # Start function to print title and return url login
    public function login() {
        return view('members.login', ['title' => 'Login']);
    }

    # Start function logic do login
    public function logicLogin(Request $request) {
        # Check validate data before login
        $data = $this -> validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|min:7|max:20' // When used min:8 Erros ??
        ]);

        // # Convert password to encrypt
        // $data['password'] = bcrypt($data['password']);

        # Store and check auth data
        $checkData = auth() -> attempt($data);

        # Conditional to check data
        if($checkData):
            echo 'good';
            return redirect(url('member'));

        else:
            echo 'errors';
            //return redirect(url('login'));
        endif;

    }
}
