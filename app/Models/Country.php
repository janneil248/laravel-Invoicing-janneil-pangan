<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $primaryKey = 'country_id';
    protected $fillable = ['country','iso_code'];

    public function branch(){
        return $this->hasMany(Branch::class, 'country_id');
    }

    public function userxbranch(){
        return $this->hasManyThrough(User::class, Branch::class, 'country_id', 'branch_id', 'country_id', 'branch_id');
    }
   
}
