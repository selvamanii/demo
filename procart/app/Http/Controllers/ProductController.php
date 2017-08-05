<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Product;
use App\Order;
use App\Cart;
use Redirect;
use Session;
use Validator;
use Auth;
use App\Address;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function products() {
        $product = new product;
        $productlist = $product->getAllProducts();
        $fetchCartProCount = new cart;
        $cartcount = $fetchCartProCount->fetchcartcount();
        return view("/products", ['productslist' => $productlist, 'cartcount' => $cartcount]);
    }

    public function cart() {
        //fetch cart list
        $fetchCartProduct = new cart;
        $fetchCartlist = $fetchCartProduct->fetchCartProducts();
        return view("/cart", ['cartproducts' => $fetchCartlist]);
    }

    public function savecart(Request $request, $id) {
        //add to cart
        $user_id = Auth::user()->id;
        $addNewProduct = new cart;
        $addNewProduct->user_id = $user_id;
        $addNewProduct->product_id = $id;
        $addNewProduct->save();
        Session::flash('success', 'Add Your Product To Cart');
        return redirect('/');
    }

    public function saveorder(Request $request) {

        $user_id = Auth::user()->id;


        // $orderModel->latest('id')->first();



        if (count($request->qtn) == 0) {
            Session::flash('error', 'SomeThing Went Wrong');
            return redirect('cart/');
        } else {
            //save order to order table
            $addOrder = new Order;
            $orderno = "ORD" . rand(111, 999);
            $addOrder->order_no = $orderno;
            $addOrder->user_id = $user_id;
            $addOrder->save();
            $insert_id = $addOrder->id;

            $addOrderToCart = new cart;
            $saveproTotalPrice = 0;
            for ($i = 0; $i < count($request->qtn); $i++) {
                //quantity details
                $cart_id = $request->cart_id[$i];
                $quantity = $request->qtn[$i];

                //get product details

                $productprice = $addOrderToCart->leftJoin('product', 'cart.product_id', '=', 'product.id')
                        ->select('product.price')
                        ->where('cart.id', '=', $cart_id)
                        ->first();

                //price details
                $proPerPrice = $productprice->price;
                $proTotalPrice = $proPerPrice * $quantity;

                //order details add to cart table
                $addOrderToCart->where('id', $cart_id)
                        ->update(['quantity' => $quantity, 'order_id' => $insert_id, 'per_price' => $proPerPrice, 'total_price' => $proTotalPrice, 'status' => 1]);

                $saveproTotalPrice = $saveproTotalPrice + $proTotalPrice;
            }

            $totalamountOrder = new Order;
            $totalamountOrder->where('id', $insert_id)
                    ->update(['amount' => $saveproTotalPrice]);




            Session::flash('success', 'Succefully place your order');
            return redirect()->route('order', $insert_id);
        }
    }

    public function order(Request $request, $id) {

        $fetchThisOrder = new cart;
        $getThisOrderDetails = $fetchThisOrder->fetchThisOrder($id);
        return view("/order", ['orderDetails' => $getThisOrderDetails]);
    }

    public function saveaddress(Request $request) {

        $user_id = Auth::user()->id;
        $addAddress = new Address;
        $addAddress->user_id = $user_id;
        $addAddress->name = $request->name;
        $addAddress->mobile_no = $request->mbno;
        $addAddress->address = $request->address;
        $addAddress->pin_code = $request->pincode;
        $addAddress->save();
        return view('/payment');
    }

    public function payment() {

    }

    public function deletecart($id) {
        Cart::findOrFail($id)->delete();
        Session::flash('success', 'cart are Deleted ');
        return redirect('cart/');
    }

    public function orderlist() {
        $fetchAllOrder = new order;
        $getAllOrderList = $fetchAllOrder->fetchAllOrder();
        return view("/orderlist", ['orderlist' => $getAllOrderList]);
    }

    public function


    orderview($id) {
        $fetchSingleOrder = new order;
        $getfetchSingleOrder = $fetchSingleOrder->fetchsingleOrder;

        //return view("/orderlist");
    }

}
