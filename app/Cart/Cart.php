<?php

namespace App\Cart;

use App\Cart\Contracts\CartInterface;
use App\Models\User;
use Illuminate\Session\SessionManager;
use App\Models\Cart as CartModel;

class Cart implements CartInterface
{

    public function __construct(protected SessionManager $session) { }

    public function create(?User $user = null)
    {
        $instance = CartModel::make();

        if ($user) {
            $instance->user()->associate($user);
        }

        $instance->save();

        $this->session->put(config('cart.session.key'), $instance->uuid);
    }

    public function exists()
    {
        return $this->session->has(config('cart.session.key'));
    }

}
