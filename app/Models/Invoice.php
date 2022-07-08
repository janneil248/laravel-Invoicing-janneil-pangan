<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;

    public static function nextid(){
        $nextid = DB::table('invoices')->lastInsertId();
    return $nextid;
    }

    public static function invoicesxusersxcustomers()
    {
        $allitems = DB::table('invoices')
            ->join('users', 'users.user_id', '=', 'invoices.sold_by')
            ->join('customers', 'customers.customer_id', '=', 'invoices.customer_id')
            ->select('invoices.*', 'users.*','customers.*')
            ->orderBy('invoice_number')
            ->get();

        return $allitems;
    }
    public static function findinvoicesxusersxcustomersxsales($id)
    {
        $allitems = DB::table('invoices')
            ->join('users', 'users.user_id', '=', 'invoices.sold_by')
            ->join('customers', 'customers.customer_id', '=', 'invoices.customer_id')
            ->join('sales', 'sales.invoice_number', '=', 'invoices.invoice_number')
            ->join('items', 'items.item_id', '=', 'sales.item_id')
            ->join('brands', 'brands.brand_id', '=', 'items.brand_id')
            ->select('invoices.*','sales.*', 'users.*','customers.*','items.*','brands.*')
            
            ->where('invoices.invoice_number','=',$id)
            ->get();

        return $allitems;
    }
}
