<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index', [
            'customers' => Customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'customer_firstname' => 'required',
                'customer_lastname' => 'required',
                'customer_username' => 'required',
                'customer_address' => 'required'
                
            
            ]);
            $customer = new Customer();
            $customer->customer_firstname = $request->customer_firstname;
            $customer->customer_lastname = $request->customer_lastname;
            $customer->customer_username = $request->customer_username;
            $customer->customer_address = $request->customer_address;
            $customer->save();
            return redirect('customers')->with('mssg','New Customer Successfully Created')->setStatusCode(201);
        }  catch (\Exception $e){
            $error_code = $e->errorInfo[1];
            if($error_code == 1062){
                return redirect('customers/create')->with('mssg','Customer is Already Registered')->setStatusCode(404);
            }
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('customer.show',[
            'customers'=> Customer::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('customer.edit',[
        'customer' => Customer::find($id)
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'customer_firstname' => 'required',
            'customer_lastname' => 'required',
            'customer_username' => 'required',
            'customer_address' => 'required'
            
        
        ]);
        $customer = Customer::find($id);
        $customer->customer_firstname = $request->customer_firstname;
        $customer->customer_lastname = $request->customer_lastname;
        $customer->customer_username = $request->customer_username;
        $customer->customer_address = $request->customer_address;
        $customer->save();
        return redirect('customers')->with('mssg','Customer Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('customers')->with('mssg','Customer Successfully Deleted');
    }
}
