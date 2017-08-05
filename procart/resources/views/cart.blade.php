<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Procart</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/font-awesome.css">
        <link rel="stylesheet" href="public/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {height: 1500px}

            /* Set gray background color and 100% height */
            .sidenav {
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {height: auto;}
            }
        </style>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav">
                    <h3> Welcome {{ Auth::user()->name}} !!</h3>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="{{URL::to('/') }}">Product List</a></li>
                        <li><a href="{{URL::to('/orderlist') }}">Order List</a></li>
                        <li><a href="{{URL::to('/logout') }}">Logout</a></li>
                    </ul><br>
                </div>
                <div class="col-sm-9">
                    <h4><small>YOUR CART DETAILS </small></h4>
                    @if(Session::has('success'))
                    <div class="alert-box success">
                        <h4>{!! Session::get('success') !!}</h4>
                    </div>
                    @endif
                    <div class="col-sm-12 col-lg-12">
                        @if(count($cartproducts))

                        <form method="post" name="" action="order">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th> ID</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Per Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($cartproducts as $cart)

                                    <tr>
                                        <td>{{$cart->id}}</td>
                                        <td>{{$cart->name}}</td>
                                        <td> <img src="/procart/public/images/{{$cart->image}}" width="100" height="100"></td>
                                        <td><i class="fa fa-inr"></i> {{$cart->price}}</td>
                                        <td>

                                            <input type="hidden" name="cart_id[]" value="{{$cart->id}}">
                                            <input type="number" name="qtn[]" value="1" id="qtn"    >
                                            <input type="hidden" name="price" value="{{$cart->price}}" id="price">

                                            <button type="button" id="qtn" onclick="totalprice(this.id);">ssd</button>

                                        </td>

                                        <td><i class="fa fa-inr"></i> 0</td>
                                        <td><a href="{{ URL::to('/cart/delete',$cart->id) }}"  onclick="return confirm('Are you sure you want to delete this item?');"><i class="text-danger">X</i></a> </td>
                                    </tr>
                                    @endforeach
                                    <tr><td colspan="7"></td></tr>

                                    <tr class="text-right"><td colspan="5">Total Amount : <i class="fa fa-inr"></i></td></tr>
                                    <tr class="text-right"><td colspan="6">
                                            <a href="{{URL::to('/') }}" class="btn btn-success">ADD PRODUCT</a>

                                            <input type="submit" class="btn btn-warning" value="PALCE YOUR ORDER">
                                        </td>

                                    </tr>
                                </tbody>
                            </table>

                        </form>
                        @else
                        <h3>No Product Your Cart</h3>

                        @endif
                    </div>

                </div>
            </div>
        </div>

        <footer class="container-fluid">
            <p>Footer Text</p>
        </footer>


        <script type="text/javascript">


            $(document).ready(function () {
                //alert('alert');

                function totalproce($str)
                {
                    alert("fun");
                }

                //$('.qtn').on('blur', function () {
                //Some code
                //var qnty = this.id;
                //  var amont = $("#price").value;
                //alert(this.id);
                //});



            });
        </script>
    </body>
</html>
