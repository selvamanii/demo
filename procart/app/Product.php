<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\cart;

class Product extends Model {

    protected $table = 'product';

    public function getAllProducts() {
        $getAllProducts = $this->get();
        return $getAllProducts;
    }

}
