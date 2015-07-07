<?php

namespace App\Http\Controllers;

use App\Member\Family;
use App\Member\Member;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

class FamilyController extends Controller
{

    /*
        |--------------------------------------------------------------------------
        | CUSTOM METHODS
        |--------------------------------------------------------------------------
    */



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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     *
     */
    public function create()
    {
        $member = Member::find(Request::all()['member_id']);
        $member_list = Member::memberDropdown(true,true);
        return view('family.create',compact('member','member_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $inputs = $this->checkFamilyMembersSelect(Request::all());
        $member = Member::find($inputs['member_id'])->load('family');
        if(!$member->family){
            $family = Family::create();
            $member->update(['family_id' => $family->id]);
        }
        $family = Family::find($member->family_id);
        if($this->addMembersToFamily($family,$inputs['family_members_id'])){
            flash()->success('Members successfully added to family.');
            return redirect(url('member/' . $member->id));
        }
        flash()->error('There was an error adding members to family. Please try again.');
        return redirect()->back();
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

/*
    |--------------------------------------------------------------------------
    | HELPER FUNCTIONS
    |--------------------------------------------------------------------------
*/


    /**
     * Check the inputs that are sent via the create family form.
     *
     * @param $inputs
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function checkFamilyMembersSelect($inputs)
    {
        $family_members = $inputs['family_members_id'];
        if (count($family_members) < 1) {
            flash()->error('Please select a member from the dropdown list.');
            return redirect()->back();
        }

        return $inputs;
    }


    /**
     * This method loops through a member_list (array of member ids) and add the
     * provided family.
     *
     * @param Family $family
     * @param array  $member_list
     *
     * @return bool
     */
    private function addMembersToFamily(Family $family, array $member_list)
    {
        foreach($member_list as $member_id){
            if($member = Member::find($member_id)){
                $member->update(['family_id' => $family->id]);
            }
        }

        return true;
    }
}
