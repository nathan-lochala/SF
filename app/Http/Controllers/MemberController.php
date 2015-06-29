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
