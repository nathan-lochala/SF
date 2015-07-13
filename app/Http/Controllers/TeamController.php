<?php

namespace App\Http\Controllers;

use App\Member\Member;
use App\Team\Team;
use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{

    /*
        |--------------------------------------------------------------------------
        | CUSTOM METHODS
        |--------------------------------------------------------------------------
    */


    /**
     * Display the "Add Members" form
     *
     * @param Team $team
     *
     * @return \Illuminate\View\View
     */
    public function addMembers(Team $team)
    {
        $member_list = Member::memberDropdown(true);
        return view('team.add_members',compact('member_list','team'));
    }

    /**
     * Add members to a team
     *
     * @param Team $team
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeAddMembers(Team $team)
    {
        $member_list = Request::all()['member_id'];
        $team->members()->attach($member_list);

        return redirect(url('team/' . $team->id));
    }

    /**
     * Remove a member from a team
     *
     * @param Team   $team
     * @param Member $member
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeMember(Team $team, Member $member)
    {
        $team->members()->detach($member->id);

        return redirect()->back();
    }

    /**
     * Add a member to a team that has previously expressed interest in joining.
     *
     * @param Team   $team
     * @param Member $member
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addMember(Team $team, Member $member)
    {
        $team->members()->attach($member->id);
        $team->interestedMembers()->detach($member->id);

        return redirect()->back();
    }


    /**
     * This will clear out all the interested members from the team.
     *
     * @param Team $team
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeInterestedMembers(Team $team)
    {
        $team->interestedMembers()->detach();

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
        $member_list = Member::memberDropdown(true);
        $team_list = Team::orderBy('name','asc')->get();
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
     * @param Team $team
     *
     * @return Response
     * @internal param int $id
     */
    public function show(Team $team)
    {
        $member_list = $team->members;
        $interests_list = $team->interestedMembers;

        return view('team.show',compact('member_list','interests_list','team'));
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
