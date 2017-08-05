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
                    <?php
                    $arr = array('a' => 1, 'b' => 2, 'c' => 3);
                    json_encode($arr);
                    $json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
                    $ty = json_decode($json, true);


                    $arrytest = array(array('a' => 1, 'b' => 2), array('c' => 3), array('d' => 4));
                    echo json_encode($arrytest, JSON_FORCE_OBJECT);



                    $tjsn = '{"0":{"a":1,"b":2},"1":{"c":3},"2":{"d":4}}';
                    $tyn = json_decode($tjsn, true);

                    print_r($tyn[0]);

                    foreach ($tyn[0] as $tj) {
                        echo $tj;
                    }
                    ?>


<?php
$id = isset(Auth::user()->id) ? Auth::user()->id : '';
?>

                    @if($id)
                    <h3> Welcome {{ Auth::user()->name}} !!</h3>

                    @else
                    <h4>Login User</h4>
                    @endif
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="{{ URL::to('/') }}">Product List</a></li>
                        @if($id)
                        <li><a href="{{ URL::to('/cart') }}">Your Cart </a></li>
                        <li><a href="{{ URL::to('/orderlist') }}">Order List</a></li>

                        <li><a href="{{ URL::to('/logout') }}">Logout</a></li>
                        @else
                        <li><a href="{{ URL::to('/login') }}">Login</a></li>
                        @endif
                    </ul>

                    <br>

                </div>



                <div class="col-sm-9 content">
                    <h4><small>PRODUCT LIST</small> </h4>
                    <h4  class="text-right"> <a href="{{ URL::to('/cart') }}"><span class="badge btn-success"><i class="fa fa-shopping-cart fa-2x"></i> @if($id){{$cartcount}} @else 0 @endif</span></a></h4>
                    <hr>
                    <div class="col-sm-12 col-lg-12">
                        @if($productslist)
                        @foreach($productslist as $product)
                        <div class="col-sm-6">
                            <h3 class="text-capitalize">{{$product->name}}</h3>
                            <h5><span class="glyphicon glyphicon-time"></span> Post On,{{ date("F d ,Y",strtotime($product->updated_at))}}.</h5>
                            <img src="/procart/public/images/{{$product->image}}" width="250" height="200">
                            <h3 class="text-capitalize text-danger"><i class="fa fa-inr "></i> : {{$product->price}}</h3>

                            @if($id)
                            <a href="{{ URL::to('/cart',array($product->id)) }}"><button type="button" class="btn btn-success">Add To Cart</button></a>
                            @else
                            <a href="{{ URL::to('/login') }}"><button type="button" class="btn btn-success">Add To Cart</button></a>
                            @endif
                            <br><br>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>



            </div>
        </div>

        <footer class="container-fluid">
            <p>Footer Text</p>
        </footer>

    </body>
</html>

