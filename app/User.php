<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];


    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    public function getCartTotalAttribute()
    {
        $total = 0;
        foreach ($this->cartItems as $item) {
            $total += $item->product->discounted_price * $item->quantity;
        }

        return $total;
    }


}
