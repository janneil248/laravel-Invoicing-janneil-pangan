<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __contruct() {

    }

    public function index() {
        return view('country.index', [
            'countries' => Country::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        $this->validate($request,[
            'country' => 'required',
            'iso_code' => 'required'
        ]);

        $country = new Country();
        $country->country = $request->country;
        $country->iso_code = $request->iso_code;
        $country->save();
        // return response()->json($country);
        return redirect('countries')->with('mssg','New Country Successfully Created')->setStatusCode(201);
    }  catch (\Exception $e){
        $error_code = $e->errorInfo[1];
        if($error_code == 1062){
            return redirect('countries/create')->with('mssg','Country is Already Registered')->setStatusCode(404);
        }
    };
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('country.show', [
            'countries' => Country::find($id)
        ]);
    }

    public function userxbranch($id)
    {
        $country = Country::find($id);
        return response()->json($country->userxbranch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            return view('country.edit', [
                'countries' => Country::find($id)
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'country' => 'required',
            'iso_code' => 'required'
        ]);

        $country = Country::find($id);
        $country->country = $request->country;
        $country->iso_code = $request->iso_code;
        $country->save();
        return redirect('countries')->with('mssg','Country Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect('countries')->with('mssg','Country Successfully Deleted');
    }
}
