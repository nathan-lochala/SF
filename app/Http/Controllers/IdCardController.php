<?php

namespace App\Http\Controllers;

use App\Member\Member;
use App\Member\PrintList;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Request;

class IdCardController extends Controller
{

    /*
        |--------------------------------------------------------------------------
        | CUSTOM METHODS
        |--------------------------------------------------------------------------
    */

    /**
     * Take an existing Print List ID and mark it to be reprinted
     *
     * @param PrintList $id_card
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reprint(PrintList $id_card)
    {
        $id_card->update([
            'created_at' => Carbon::now(),
            'printed_at' => null,
            'received_at' => null
        ]);

        flash()->success('ID Card set to be re-printed.');
        return redirect()->back();
    }

    /**
     * Take the ID Card and mark it as Received
     *
     * @param PrintList $id_card
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function received(PrintList $id_card)
    {
        $id_card->update(['received_at' => Carbon::now()]);
        if( ! $id_card->printed_at){
            $id_card->update(['printed_at' => Carbon::now()]);
        }

        flash()->success('ID Card Received');
        return redirect()->back();
    }

    /**
     * Take the ID Card and mark it as Printed
     *
     * @param PrintList $id_card
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function printed(PrintList $id_card)
    {
        $id_card->update(['printed_at' => Carbon::now()]);

        flash()->success('ID Card Printed');
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
        // ID Card Dashboard
        $print_list = PrintList::printing()->with('member')->get(); //Those that have NOT been printed yet.
        $receive_list = PrintList::receiving()->with('member')->get(); //Those that have NOT been delivered yet.

        return view('idcard.index',compact('print_list','receive_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Member $member
     *
     * @return Response
     */
    public function create(Member $member)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $inputs = Request::all();
        $id_card = PrintList::create([
            'member_id' => $inputs['member_id']
        ]);
        if ($id_card) {
            flash()->success('Member added to Print List.');

            return redirect()->back();
        }

        flash()->error('There was an error adding member to Print List. Please try again.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
