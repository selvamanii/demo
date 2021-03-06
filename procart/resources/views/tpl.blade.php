<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
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
                    </ul><br>
                </div>






            </div>
        </div>

        <footer class="container-fluid">
            <p>Footer Text</p>
        </footer>

    </body>
</html>
