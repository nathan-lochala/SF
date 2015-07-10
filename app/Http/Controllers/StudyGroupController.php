<?php

namespace App\Http\Controllers;

use App\District\District;
use App\Member\Member;
use App\StudyGroup\StudyGroup;
use App\Http\Requests;
use Carbon\Carbon;
use Request;

class StudyGroupController extends Controller
{

    /*
        |--------------------------------------------------------------------------
        | CUSTOM METHODS
        |--------------------------------------------------------------------------
    */

    /**
     * Add members to a study group
     *
     * @param StudyGroup $group
     *
     * @return \Illuminate\View\View
     */
    public function addMembers(StudyGroup $group)
    {
        $member_list = Member::memberDropdown(true);
        return view('study_group.add_members',compact('member_list','group'));
    }

    /**
     * Bulk add users to a study group
     *
     * @param StudyGroup $group
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeAddMembers(StudyGroup $group)
    {
        $member_list = Request::all()['member_id'];
        $group->members()->attach($member_list);

        return redirect(url('study_group/' . $group->id));
    }

    /**
     * Remove a selected member from a study group
     *
     * @param StudyGroup $group
     * @param Member     $member
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeMember(StudyGroup $group, Member $member)
    {
        $group->members()->detach($member->id);

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
        $group_list = StudyGroup::all()->load('members');
        return view('study_group.index',compact('group_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $group_list = StudyGroup::all();
        $district_list = District::districtDropdown();
        $member_list = Member::memberDropdown(true);
        return view('study_group.create',compact('group_list','district_list','member_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $inputs = Request::all();
        $inputs['meeting_time'] = Carbon::parse($inputs['meeting_time']);
        $group = StudyGroup::create($inputs);
        if($group){
            flash()->success('The study group, ' . $group->name . ' has been created');
            return redirect(url('study_group/create'));
        }

        flash()->error('There was a problem creating the group. Please try again.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param StudyGroup $group
     *
     * @return Response
     * @internal param int $id
     */
    public function show(StudyGroup $group)
    {
        $member_list = $group->members;
        return view('study_group.show',compact('group','member_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StudyGroup $group
     *
     * @return Response
     */
    public function edit(StudyGroup $group)
    {
        $district_list = District::districtDropdown();
        $member_list = Member::memberDropdown(true);
        return view('study_group.edit',compact('district_list','member_list','group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudyGroup $group
     *
     * @return Response
     * @internal param int $id
     */
    public function update(StudyGroup $group)
    {
        $inputs = Request::all();
        $inputs['meeting_time'] = Carbon::parse($inputs['meeting_time']);
        $group->update($inputs);
        if($group){
            flash()->success('The study group, ' . $group->name . ' has been updated.');
            return redirect(url('study_group/' . $group->id));
        }

        flash()->error('There was a problem updating the group. Please try again.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StudyGroup $group
     *
     * @return Response
     * @internal param int $id
     */
    public function destroy(StudyGroup $group)
    {
        $group->delete();
        flash()->success('The group has been successfully deleted.');

        return redirect()->back();
    }
}
