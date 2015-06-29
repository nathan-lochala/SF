<?php

namespace App\Http\Controllers;

use App\Member\Member;
use App\Team\Team;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $member_list = Member::memberDropdown(true);
        $team_list = Team::all();
        return view('team.index',compact('member_list','team_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $member_list = Member::memberDropdown(FALSE);
        $team_list = Team::all();
        return view('team.create',compact('member_list','team_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $team = Team::create(Request::all());
        if($team){
            flash()->success('The team, "' . $team->name . '" created successfully!');
        }

        return redirect(url('team/create'));
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
     * @param Team $team
     *
     * @return Response
     */
    public function edit(Team $team)
    {
        $member_list = Member::memberDropdown(FALSE);
        return view('team.edit',compact('team','member_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Team $team
     *
     * @return Response
     */
    public function update(Team $team)
    {
        $team->update(Request::all());
        if($team){
            flash()->success('The team, "' . $team->name . '" updated successfully!');
        }
        return redirect(url('team/create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     *
     * @return Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        flash()->success('Team successfully deleted.');
        return redirect(url('team/create'));
    }
}
