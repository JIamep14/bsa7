<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    private $messages = [
        'firstname.regex' => 'The firstname must contain only letters',
        'lastname.regex' => 'The lastname must contain only letters',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.user', ['users' => User::orderBy('lastname', 'ASC')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'firstname'=> array('required', 'min:3', 'regex:/^[a-zA-Z]+$/'),
            'lastname' => array('required','min:3','Regex:/^[a-zA-Z]+$/'),
            'email' => 'required|email|unique:users'
        );
//                'required|regex:[A-Za-z]',
        $validator = Validator::make($request->all(), $rules, $this->messages);
        if($validator->fails()) {
            return Redirect::to('user/create')->withErrors($validator)->withInput();
        } else {

            $user = new User($request->all());
            //$user->firstname = $request->firstname;
            //$user->lastname = $request->lastname;
            //$user->email = $request->email;
            $user->save();

            Session::flash('message', 'Succesfully added user');
            return Redirect::to('user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', ['user' => $user]);
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
        $rules = array(
            'firstname'=> array('required', 'min:3', 'regex:/^[a-zA-Z]+$/'),
            'lastname' => array('required','min:3','Regex:/^[a-zA-Z]+$/'),
            'email' => 'required|email|unique:users,id,'.$id
        );
//                'required|regex:[A-Za-z]',
        $validator = Validator::make($request->all(), $rules, $this->messages);
        if($validator->fails()) {
            return Redirect::to('user/'.$id.'/edit')->withErrors($validator)->withInput();
        } else {

            $user = User::find($id);
            //$user->firstname = $request->firstname;
            //$user->lastname = $request->lastname;
            //$user->email = $request->email;
            //$user->save();
            $user->update($request->all());

            Session::flash('message', 'Succesfully updated user');
            return Redirect::to('user');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('message', 'User succesfully deleted');
        return Redirect::to('/user');
    }
}
