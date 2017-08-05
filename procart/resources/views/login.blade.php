
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    </head>
    <body>





        <div class="container">
            <h3 style="text-align:center">User Login</h3>

            <div class="col-lg-offset-2 col-sm-8">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        login
                    </div>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="panel-body">

                        <form method="post" action="" class=""  >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="">User:</label>
                                <input type="email" name="email" required="" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="">Password:</label>
                                <input type="password" name="password" required="" class="form-control" >
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>




                        </form>
                    </div>




                </div>
            </div>


        </div>



    </div>






</body>
</html>




