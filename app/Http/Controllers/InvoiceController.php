<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Sale;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoice.index', [
            'invoices' => Invoice::invoicesxusersxcustomers()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $lastinvoice = Invoice::latest('invoice_number')->first();
       if (empty($lastinvoice)){
            $nextinvoiceid = 1;
        }else{
            $nextinvoiceid = $lastinvoice->invoice_number + 1;
        }
       
        return view('invoice.create', [
            'nextinvoiceid' => $nextinvoiceid,
            'transactions' => Transaction::findtransactionxitem($nextinvoiceid),
            'total' => Transaction::findtransactionxitem($nextinvoiceid)->sum('total'),
            'customers' =>Customer::all(),
            'users' => User::all()
           
      
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
            'sold_by' => 'required',
            'customer_id' => 'required',
            'comment' => 'required',
            'payment_status' => 'required',
            'grand_total' => 'required'

          
        
        ]);

        $invoice = new Invoice();
        $invoice->sold_by = $request->sold_by;
        $invoice->customer_id = $request->customer_id;
        $invoice->comment = $request->comment;
        $invoice->payment_status = $request->payment_status;
        $invoice->grand_total = $request->grand_total;
        $invoice->save();
        $lastid = $invoice->id;


        foreach (Transaction::transactionxitem() as $transaction){
        $sale = new Sale();
        $sale->invoice_number = $lastid;
        $sale->item_id = $transaction->item_id;
        $sale->price = $transaction->price;
        $sale->quantity = $transaction->quantity;
        $sale->save();
        }

        Transaction::where('account_number', $lastid)->delete();
        return redirect('invoices')->with('mssg','New Invoice Created')->setStatusCode(201);
      

       
            
            return redirect('transactions/create')->with('mssg', 'Successfully deleted');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
        return view('invoice.show', [
            'invoice' => Invoice::findinvoicesxusersxcustomersxsales($id)->first(),
            'invoices' => Invoice::findinvoicesxusersxcustomersxsales($id)
        ]);
        } catch (\Exception $e){
            $error_code = $e->errorInfo[1];
            if($error_code){
                return redirect('invoice.index')->with('mssg','No Items in Invoice');
            };

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
