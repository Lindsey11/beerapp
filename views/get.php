<!DOCTYPE html>
<html>
<head>
    <title>VIEW BEERS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>



<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Rate this beer</h4>
            </div>
            <div class="modal-body">
                <form action="http://beerapp/api/rating/add" method="post" id="frm_add">
                    <input type="hidden" value="add" name="action" id="action">
                    <div class="form-group">
                        <label for="aroma" class="control-label">Aroma (1-5):</label>
                        <input type="text" class="form-control"  name="aroma"/>
                    </div>
                    <div class="form-group">
                        <label for="appearance" class="control-label">Appearance (1-5)</label>
                        <input type="text" class="form-control" name="appearance"/>
                    </div>
                    <div class="form-group">
                        <label for="taste" class="control-label">Taste (1-10)</label>
                        <input type="text" class="form-control"  name="taste"/>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_add" class="btn btn-primary">Rate</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="container" style="width:800px;">
    <span><img src="../assests/images/logo_big.png"></span><img src="../assests/images/beer.png" class="masthead-brand"><br />
    <br class="table-responsive">
        <h4>List of our company beers. See a beer without a rating? well then try it and rate it !! </h4></br>
        <table class="table table-striped"">

            <?php
            $data = file_get_contents("http://beerapp/api/beer");

            $data = json_decode($data, true);

            echo "<tr><th>Beer</th><th>IBU</th><th>calories</th><th>ABV%</th><th>Style</th><th>location</th> <th>ADDED BY</th><th>Rating overall</th><th>Actions</th><th></th></tr>";
            foreach($data as $row)
            {

                echo '<tr><td>'.$row["beer"].'</td>'.'<td>'.$row["ibu"].'</td>'.'<td>'.$row["calories"].'</td>'.'<td>'.$row["abv"].'</td>'.'<td>'.$row["style"].'</td>'.'<td>'.$row["location"].'</td>'.'<td>'.$row["full_name"].'<td>'.$row["overall"].'</td><td><button class="btn btn-xs btn-default" data-toggle="modal" data-target="#add_model"><span>Rate this Beer</span> </button></td></tr>';

            }

            ?>
        </table>

        <a href="home.html" class="btn btn-lg btn-default">Back home</a>
        <a href="add.php" class="btn btn-lg btn-default">Add a new beer</a>
    </div>
</div>
<br />
</body>
</html>





