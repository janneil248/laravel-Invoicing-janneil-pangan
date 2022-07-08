<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Branch extends Model
{
    use HasFactory;
    protected $primaryKey = 'branch_id';

    public static function branchxcountry()
    {
        $allbranch = DB::table('branches')
            ->join('countries', 'countries.country_id', '=', 'branches.country_id')
            ->select('branches.*', 'countries.*',)
            ->get();

        return $allbranch;
    }

    public static function findbranchxcountry($id)
    {
        $allbranch = DB::table('branches')
            ->join('countries', 'countries.country_id', '=', 'branches.country_id')
            ->select('branches.*', 'countries.*',)
            ->where('branches.branch_id','=',$id)
            ->first();

        return $allbranch;
    }
}
