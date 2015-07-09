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
        //
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
            return redirect(url('study_group/create'));
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
