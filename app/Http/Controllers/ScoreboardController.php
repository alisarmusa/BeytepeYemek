<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Scoreboard;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\User;
use Hash;
use Validator;
use Auth;


class ScoreboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scoreboards = Scoreboard::all();
        return view('scoreboard/index')->with( 'scoreboards', $scoreboards );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::pluck('product_name','id')->prepend('Please Select','');
        return view('scoreboard/new')->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scoreboard = new Scoreboard();

        $scoreboard->name = Input::get('name');
        $scoreboard->product_id = Input::get('product_id');


        if($scoreboard->save())
        {
            Session::flash('message','Scoreboard was successfully created');
            Session::flash('m-class','alert-success');
            return redirect('scoreboard');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('scoreboard/create');
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
        $scoreboard = Scoreboard::find($id);
        return view('scoreboard/show')->with('scoreboard', $scoreboard);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scoreboard = Scoreboard::find($id);
        $product = Product::pluck('product_name','id');
        return view('scoreboard/edit')->with(['scoreboard' => $scoreboard,'product' => $product]);
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
        $scoreboard = Scoreboard::find($id);

        $scoreboard->name = Input::get('name');
        $scoreboard->product_id = Input::get('product_id');

        if($scoreboard->save())
        {
            Session::flash('message','Scoreboard was successfully updated');
            Session::flash('m-class','alert-success');
            return redirect('scoreboard');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('scoreboard/create');
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
        Scoreboard::find($id)->delete();

        Session::flash('message','Scoreboard was successfully deleted');
        Session::flash('m-class','alert-success');
        return redirect('scoreboard');
    }

    //UPDATE Password
    public function password(){
        return View('password');
    }

    public function updatePassword(Request $request){
        $rules = [
            'mypassword' => 'required',
            'password' => 'required|confirmed|min:6|max:18',
        ];
        
        $messages = [
            'mypassword.required' => 'Current password is required',
            'password.required' => 'New password is required',
            'password.confirmed' => 'Passwords do not match',
            'password.min' => 'Password is too short (minimum is 6 characters)',
            'password.max' => 'Password is too long (maximum is 18 characters)',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('password')->withErrors($validator);
        }
        else{
            if (Hash::check($request->mypassword, Auth::user()->password)){
                $user = new User;
                $user->where('email', '=', Auth::user()->email)
                     ->update(['password' => bcrypt($request->password)]);
                return redirect('/')->with('message', 'Password changed successfully')->with('m-class','alert-success');
            }
            else
            {
                return redirect('password')->with('message', 'Current password is invalid')->with('m-class','alert-danger');
            }
        }
    }
}
