<?php

namespace App\Http\Controllers;

use App\District\District;
use App\Member\Family;
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

    public function viewAll()
    {
        $member_list = Member::all();
        return view('member.view-all',compact('member_list'));
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


    /**
     * Remove the family from the member
     *
     * @param Member $member
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeFamily(Member $member)
    {
        $member->update(['family_id' => null]);
        flash()->success('Member removed from family.');
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
        return view('member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $inputs = Request::all();
        $member = null;
        $email = null;
        $mobile = null;
        $district_id = null;
        if(isset($inputs['family_id']) && $family_id = $inputs['family_id']){
            $member = Member::where('family_id','=',$family_id)->first();
            $email = $member->email;
            $mobile = $member->mobile;
            $district_id = $member->district_id;
        }
        $district_list = District::districtDropdown();
        $member_list = Member::today()->orderBy('created_at','desc')->get();
        return view('member.create',compact('district_list','member_list','member','email','mobile','district_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $inputs = Request::all();
        $member = $this->storeNewMember($inputs);
        if($member){
            flash()->success('Member added successfully!');
        }
        if(isset($inputs['new_family'])){
            //Make sure member has a family
            //pass the family id to the view
            if( ! $member->family){
                $member = $this->storeNewFamily($member);
            }
            return redirect('member/create?family_id=' . $member->family->id);
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
        $card_list = $member->idCard;
        if(!$card_list->isEmpty()) {
            foreach($card_list as $idcard){
                $idcard->delete();
            }
        }
        $member->delete();
        flash()->success('The member, ' . $member->getFullName() . ' has been successfully removed from the SIF member list.');
        return redirect(url('member/view_all'));
    }

    /*
        |--------------------------------------------------------------------------
        | HELPER METHODS
        |--------------------------------------------------------------------------
    */


    /**
     * Store a new member
     *
     * @param $inputs
     *
     * @return static
     */
    protected function storeNewMember($inputs)
    {
        $member = Member::cleanMemberInputs(Member::create($inputs));
        PrintList::create([
            'member_id' => $member->id
        ]);
        if(isset($inputs['team_id'])){
            $member->teamInterests()->attach($inputs['team_id']);
        }

        return $member;
    }

    /**
     * Give a member a family.
     *
     * @param $member
     *
     */
    protected function storeNewFamily($member)
    {
        $family = Family::create();
        $member->update(['family_id' => $family->id]);
        return $member->load('family');
    }
}
