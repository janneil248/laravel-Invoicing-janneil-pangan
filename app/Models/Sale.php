<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale extends Model
{
    use HasFactory;

    public static function salexinvoicexitem(){
        $all_sale = DB::table('sales')
        ->join('items', 'items.item_id', '=', 'sales.item_id')
        ->join('invoices', 'invoices.invoice_number', '=', 'sales.invoice_number')
        ->select('sales.*', 'invoices.*','items.*')
        ->get();
        return $all_sale;
    }
}
