<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'orders';

    public function fetchAllOrder() {

        $user_id = Auth::user()->id;

        $allorder = $this->where('user_id', '=', $user_id)->get();

        return $allorder;
    }

}
