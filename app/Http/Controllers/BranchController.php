<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Country;
use Illuminate\Http\Request;

class BranchController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    //  $all_branches = Branch::all();
    //  return response()->json(Branch::branchxcountry());
        return view('branch.index', [
            'branches' => Branch::branchxcountry()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('branch.create', [
            'countries' => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'branch' => 'required',
            'country_id' => 'required'
        
        ]);

        $branch = new Branch();
        $branch->branch = $request->branch;
        $branch->country_id = $request->country_id;
        $branch->save();
        return redirect('branches')->with('mssg','New Branch Successfully Created')->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        return view('branch.show', [
            'branches' => Branch::findbranchxcountry($id)
        ]);
        // $branch = Branch::find($id);
        // return response()->json($branch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('branch.edit', [
            'branches' => Branch::find($id),
            'countries' => Country::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'branch' => 'required',
            'country_id' => 'required'
        
        ]);

        $branch = Branch::find($id);
        $branch->branch = $request->branch;
        $branch->country_id = $request->country_id;
        $branch->save();
        return redirect('branches')->with('mssg','Branch Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $branch = Branch::Find($id);
       $branch->delete();
       return redirect('branches')->with('mssg','Branch Successfully Deleted');
    }
}
