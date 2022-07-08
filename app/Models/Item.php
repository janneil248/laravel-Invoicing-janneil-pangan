<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;
    protected $primaryKey = 'item_id';

    public static function itemxbrandxcategory()
    {
        $allitems = DB::table('items')
            ->join('brands', 'brands.brand_id', '=', 'items.brand_id')
            ->join('categories', 'categories.category_id', '=', 'items.category_id')
            ->select('items.*', 'brands.*','categories.*')
            ->orderBy('item_id')
            ->get();

        return $allitems;
    }
    public static function finditemxbrandxcategory($id)
    {
        $allitems = DB::table('items')
            ->join('brands', 'brands.brand_id', '=', 'items.brand_id')
            ->join('categories', 'categories.category_id', '=', 'items.category_id')
            ->select('items.*', 'brands.*','categories.*')
            ->orderBy('item_id')
            ->where('items.item_id','=',$id)
            ->first();

        return $allitems;
    }
}
