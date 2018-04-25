<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add a new beer</title>

    <!-- Bootstrap -->
    <link href="../assests/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<div class="container">
    <h1>ADD A NEW BEER BELOW</h1>
<form action="http://beerapp/api/beer/add" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">NAME OF YOUR BEER</label>
        <input type="text" class="form-control"  placeholder="Beer name" name="beer">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">IBU NUMBER</label>
        <input type="text" class="form-control"  placeholder="IBU" name="ibu">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">CALORIES</label>
        <input type="text" class="form-control"  placeholder="Calories" name="calories">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">ABV %</label>
        <input type="text" class="form-control" placeholder="%" name="abv">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">STYLE</label>
        <input type="text" class="form-control" placeholder="Style" name="style">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">LOCATION</label>
        <input type="text" class="form-control"  placeholder="Location" name="location">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">FULL NAME</label>
        <input type="text" class="form-control"  placeholder="Name" name="full_name">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>


    <a href="home.html" class="btn btn-lg btn-default">Back home</a>
</div>

</body>
</html>