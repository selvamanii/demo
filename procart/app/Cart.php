<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Product;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model {

    protected $table = 'cart';

    use SoftDeletes;

    public function product() {
        return $this->hasOne('App\Prodcut');
    }

    public function fetchcartcount() {
        $userid = isset(Auth::user()->id) ? Auth::user()->id : '';
        $fetchcartcount = $this->where('user_id', '=', $userid)->where('status', '=', '0')->count();
        return $fetchcartcount;
    }

    public function fetchCartProducts() {

        $userid = isset(Auth::user()->id) ? Auth::user()->id : '';
        $cartproductlist = $this->leftJoin('product', 'cart.product_id', '=', 'product.id')
                ->select('cart.*', 'product.name', 'product.image', 'product.price')
                ->where('cart.status', '=', '0')
                ->where('cart.user_id', '=', $userid)
                ->get();
        return $cartproductlist;
    }

    public function fetchThisOrder($id) {
        $orderProductList = $this->leftJoin('product', 'cart.product_id', '=', 'product.id')
                ->select('cart.*', 'product.name', 'product.image', 'product.price')
                ->where('cart.order_id', '=', $id)
                ->get();

        return $orderProductList;
    }

}
