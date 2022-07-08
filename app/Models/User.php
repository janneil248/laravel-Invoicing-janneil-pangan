<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username',
        'email',
        'password',
        'firstname',
        'lastname',
     
        

    ];

    public static function userxbranchxposition()
    {
        $allusers = DB::table('users')
            ->join('positions', 'positions.position_id', '=', 'users.position_id')
            ->join('branches', 'branches.branch_id', '=', 'users.branch_id')
            ->select('users.*','positions.position_name','branches.branch')
            ->get();

        return $allusers;
    }

    public static function finduserxbranchxposition($id)
    {
        $allusers = DB::table('users')
            ->join('positions', 'positions.position_id', '=', 'users.position_id')
            ->join('branches', 'branches.branch_id', '=', 'users.branch_id')
            ->select('users.*','positions.position_name','branches.branch')
            ->where('users.user_id','=',$id)
            ->get();

        return $allusers;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
