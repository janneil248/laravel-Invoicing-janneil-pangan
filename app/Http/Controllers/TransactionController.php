<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Sale;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Customer;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart()
    {
        return view('transaction.index');
    }
    public function index()
    {
        return view('transaction.index', [
            'items' => Item::itemxbrandxcategory(),
            'transactions' => Transaction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction.create', [
            'transactions' => Transaction::transactionxitem(),
            'customers' =>Customer::all()
      
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
        $this->validate($request, [
            'account_number' => 'required',
            'item_id' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        // $item = Item::findOrFail($request->item_id);
        // Cart::add($item->item_id, $item->item_name, $request->quantity, $item->price);
        $transaction = new Transaction();
        $transaction->account_number = $request->account_number;
        $transaction->item_id = $request->item_id;
        $transaction->price = $request->price;
        $transaction->quantity = $request->quantity;
        $transaction->total = $transaction->price* $transaction->quantity;
        $transaction->save();
  
        return redirect("transactions/$transaction->account_number")->with('mssg', 'Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('transaction.index', [
            'items' => Item::itemxbrandxcategory(),
            'transactions' => Transaction::findtransactionxitem($id),
            'account_number' =>$id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$account)
    {
        $item = $request->item_del;
        $findaccount = Transaction::where('account_number',$account);
        $findaccount->where('item_id',$item)->delete();
        return redirect("transactions/$account")->with('mssg', 'Successfully deleted');
    }

}
