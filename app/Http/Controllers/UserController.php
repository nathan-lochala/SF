<?php

namespace App\Http\Controllers;

use App\Events\UserEdit;
use App\Member\Member;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

class UserController extends Controller
{

    /*
        |--------------------------------------------------------------------------
        | RESET PASSWORD
        |--------------------------------------------------------------------------
    */

    /**
     * Attempt to reset the password of the given user.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function passwordReset(User $user)
    {
        $password = Request::all()['password'];
        $password_confirm = Request::all()['password_confirm'];

        if($password == $password_confirm){
            $user->update(['password' => bcrypt($password)]);
            flash()->overlay('The user\'s password as been successfully reset.<br />Username:<strong> ' . $user->email . '</strong><br />New Password: <strong>' . $password . '</strong>','Success');
            return redirect()->back();
        }

        flash()->error('The passwords given do not match. Please try again.');
        return redirect()->back();

    }

    /*
        |--------------------------------------------------------------------------
        | CRUD METHODS
        |--------------------------------------------------------------------------
    */

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user_list = User::with('member')->get();
        return view('user.index',compact('user_list'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     * @internal param Member $member
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Member $member
     *
     * @return Response
     */
    public function store(Member $member)
    {
        $password = Request::all()['password'];
        $password_confirm = Request::all()['password_confirm'];

        if($password == $password_confirm){
            $user = User::create([
                'member_id' => $member->id,
                'email' => $member->email,
                'password' => bcrypt($password)
            ]);
            if($user){
                flash()->overlay('The user has been successfully created.<br />Username:<strong> ' . $user->email . '</strong><br />Password: <strong>' . $password . '</strong>','Success');
                return redirect()->back();
            }
            flash()->error('There was a problem creating this user.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     *
     * @return Response
     * @internal param int $id
     */
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     *
     * @return Response
     * @internal param int $id
     */
    public function update(User $user)
    {
        $inputs = Request::all();
        $old_email = $user->email;

        if(!empty($inputs['new_password'])){
            //Attempting to reset user's password
            if($inputs['new_password'] !== $inputs['new_password_confirm']){
                //Passwords didn't match.
                flash()->error('Passwords did not match! Please retry.');
                return redirect()->back();
            }
            $user->password = bcrypt($inputs['new_password']);
        }

        if($old_email != $inputs['email']){
            $user->email = $inputs['email'];
        }

        $user->save();

        return redirect(url('user/manage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
