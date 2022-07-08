<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    public static function transactionxitem()
    {
        $alltrans = DB::table('transactions')
            ->join('items', 'items.item_id', '=', 'transactions.item_id')
            ->join('brands', 'brands.brand_id', '=', 'items.brand_id')
            ->select('transactions.*', 'items.*','brands.*')
            ->get();

        return $alltrans;
    }
    public static function findtransactionxitem($id)
    {
        $alltrans = DB::table('transactions')
            ->join('items', 'items.item_id', '=', 'transactions.item_id')
            ->join('brands', 'brands.brand_id', '=', 'items.brand_id')
            ->select('transactions.*', 'items.*','brands.*')
            ->where('transactions.account_number','=',$id)
            ->get();

        return $alltrans;
    }
}
