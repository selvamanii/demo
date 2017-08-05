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
                        <li><a href="{{URL::to('/logout') }}">Logout</a></li>
                    </ul><br>

                </div>
                <div class="col-sm-9">
                    <h4><small>YOUR ORDER DETAILS </small></h4>
                    @if(Session::has('success'))
                    <div class="alert-box success">
                        <h4>{!! Session::get('success') !!}</h4>
                    </div>
                    @endif


                    <div class="col-sm-12 col-lg-12">

                        <table class="table table-striped table-borderless">
                            <thead>
                                <tr>

                                    <th>ORDER ID</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Per Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th></th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $order_price = 0;
                                ?>
                                @foreach($orderDetails as $order)
                                <tr>
                                    <td>  {{$order->id}}</td>
                                    <td>  {{$order->name}}</td>
                                    <td> <img src="/procart/public/images/{{$order->image}}" width="100" height="100"></td>
                                    <td>  {{$order->price}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->total_price}}</td>

                                    <?php $order_price = $order_price + $order->total_price; ?>


                                </tr>
                                @endforeach
                                <tr class="text-right"><td colspan="6"> ORDER  AMOUNT : {{$order_price}}</td><td> </td></tr>
                                <tr class="text-right"><td colspan="5"></td></tr>
                            </tbody>
                        </table>






                    </div>


                    <div class="col-sm-12 col-lg-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                DELIVERY ADDRESS:
                            </div>

                            <div class="panel-body">
                                <form method="post" action="../payment" class="" >

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="col-lg-offset-2 col-sm-8 col-lg-8">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label for="">Name:</label>
                                            <input type="text" name="name" required="" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mobile No:</label>
                                            <input type="text" name="mbno" required="" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address:</label>
                                            <textarea class="form-control" style="resize:none;" name="address" required=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pin Code:</label>
                                            <input type="text" name="pincode" required="" class="form-control" >
                                        </div>

                                    </div>
                                    <div class="col-lg-offset-5 col-sm-4 col-lg-4">
                                        <button type="submit" class="btn btn-success">SAVE</button>
                                    </div>
                                </form>


                            </div>
                        </div>








                    </div>

                </div>
            </div>
        </div>

        <footer class="container-fluid">
            <p>Footer Text</p>
        </footer>

    </body>
</html>
