<?php

namespace App\Http\Controllers;

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






    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
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
