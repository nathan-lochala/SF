<?php

namespace App\Http\Controllers;

use App\District\District;
use App\Member\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $member_list = Member::all();
        foreach($member_list as $member){
            if(empty($member->family_id)){
                $member->family_id = null;
            }

            if(empty($member->user_id)){
                $member->user_id = null;
            }

            if(empty($member->email)){
                $member->email = null;
            }

            if(empty($member->mobile)){
                $member->mobile = null;
            }

            if(empty($member->district_id)){
                $member->district_id = null;
            }

            $member->created_at = Carbon::yesterday();
            $member->updated_at = Carbon::yesterday();

            $member->save();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
