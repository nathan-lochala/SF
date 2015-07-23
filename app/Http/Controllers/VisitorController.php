<?php

namespace App\Http\Controllers;

use App\Visitor\Visitor;
use Request;
use App\Http\Requests;

class VisitorController extends Controller
{
    /*
        |--------------------------------------------------------------------------
        | CUSTOM METHODS
        |--------------------------------------------------------------------------
    */


    /**
     * Show all the visitors from Today
     *
     * @return \Illuminate\View\View
     */
    public function all()
    {
        $title = 'All Visitors';
        $description = 'Below is the complete list of visitors at SIF.';
        $visitor_stats = Visitor::statistics('all');
        return view('visitor.statistics',compact('visitor_stats','title','description'));
    }

    /**
     * Return a view that includes an array of statistics
     *
     * @return \Illuminate\View\View
     */
    public function statistics()
    {
        $inputs = Request::all();
        if(!isset($inputs['scope']) || empty($inputs['scope'])){
            return $this->all();
        }

        list($title, $description) = $this->getTitleDescription($inputs);

        $visitor_stats = Visitor::statistics($inputs['scope']);
        return view('visitor.statistics',compact('visitor_stats','title','description'));
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('visitor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $inputs = Request::all();
        $visitor = Visitor::cleanVisitorInputs(Visitor::create($inputs));

        /** @noinspection PhpInternalEntityUsedInspection */
        flash()->success('Visitor, ' . $visitor->getFullName() . ', added successfully!');

        return redirect(url('visitor/create'));
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
     * @param Visitor $visitor
     *
     * @return Response
     * @internal param int $id
     */
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();

        flash()->success('Visitor Deleted');

        return redirect()->back();
    }

    /*
        |--------------------------------------------------------------------------
        | HELPER METHODS
        |--------------------------------------------------------------------------
    */


    /**
     * Process the title and description
     *
     * @param $inputs
     *
     * @return array
     */
    protected function getTitleDescription($inputs)
    {
        $title = 'All Visitors';
        $description = 'Below is the complete list of visitors at SIF.';

        if (isset($inputs['title'])) {
            $title = urldecode($inputs['title']);
        }
        if (isset($inputs['description'])) {
            $description = urldecode($inputs['description']);
        }

        return array($title, $description);
    }
}
