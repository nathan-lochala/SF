<?php

namespace App\Http\Controllers;

use App\District\District;
use App\Member\Member;
use App\Member\PrintList;
use App\Team\Team;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

class MemberController extends Controller
{

    /*
        |--------------------------------------------------------------------------
        | CUSTOM METHODS
        |--------------------------------------------------------------------------
    */

    /**
     * Return the search form
     *
     * @return \Illuminate\View\View
     */
    public function search()
    {
        return view('member.search');
    }

    /**
     * Process the results from a search and return them.
     *
     * @return \Illuminate\View\View
     */
    public function searchResults()
    {
        //Process Results
        $results = [];
        if(isset(Request::all()['search_term'])){
            $results = Member::search(Request::all()['search_term']);
        }
        return view('member.search',compact('results'));
    }


//TODO: Change tiles at top of Member's profile page to something more helpful.
//TODO: Create Tables on the Member's Profile for Family Members, User, Teams, Study Groups, ID Cards






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
        return view('member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $district_list = District::districtDropdown();
        $member_list = Member::today()->orderBy('created_at','desc')->get();
        return view('member.create',compact('district_list','member_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $inputs = Request::all();
        $member = Member::create($inputs);
        PrintList::create([
            'member_id' => $member->id
        ]);
        $member->teamInterests()->attach($inputs['team_id']);
        if($member){
            flash()->success('Member added successfully!');
        }
        return redirect('member/create');
    }

    /**
     * Display the specified resource.
     *
     * @param Member $member
     *
     * @return Response
     * @internal param int $id
     */
    public function show(Member $member)
    {
        return view('member/member-profile',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Member $member
     *
     * @return Response
     * @internal param int $id
     */
    public function edit(Member $member)
    {
        $district_list = District::districtDropdown();
        return view('member.edit',compact('district_list','member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Member $member
     *
     * @return Response
     * @internal param int $id
     */
    public function update(Member $member)
    {
        $member->update(Request::all());
        flash()->success('The member, "' . $member->getFullName() . '" has been successfully updated.');
        return redirect(url('member/' . $member->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Member $member
     *
     * @return Response
     * @internal param int $id
     */
    public function destroy(Member $member)
    {
        //
    }
}
