<?php
/**
 * Created by PhpStorm.
 * User: lindseydrew
 * Date: 2018/04/19
 * Time: 2:50 PM
 */


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Get All beers
$app->get('/api/beer', function(Request $request, Response $response){
    $sql = "SELECT beer, ibu, calories, abv, style, location, full_name, overall FROM beer LEFT JOIN ratings ON beer.id = ratings.id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $beer = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($beer);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get All RATINGS FOR THE BEERS
$app->get('/api/rating', function(Request $request, Response $response){
    $sql = "SELECT overall FROM ratings";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $beer = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($beer);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get Single beer
$app->get('/api/beer/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM beer WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $beer = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($beer);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get Single rating
$app->get('/api/rating/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT overall FROM ratings WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $beer = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($beer);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Add Beer
$app->post('/api/beer/add', function(Request $request, Response $response){
    $beer = $request->getParam('beer');
    $ibu = $request->getParam('ibu');
    $calories = $request->getParam('calories');
    $abv = $request->getParam('abv');
    $style = $request->getParam('style');
    $location = $request->getParam('location');
    $full_name = $request->getParam('full_name');



    $sql = "INSERT INTO beer (beer,ibu,calories,abv,style,location,full_name) VALUES
    (:beer,:ibu,:calories,:abv,:style,:location,:full_name)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':beer', $beer);
        $stmt->bindParam(':ibu', $ibu);
        $stmt->bindParam(':calories',  $calories);
        $stmt->bindParam(':abv',      $abv);
        $stmt->bindParam(':style',      $style);
        $stmt->bindParam(':location',    $location);
        $stmt->bindParam(':full_name',    $full_name);

        $stmt->execute();

        echo '{"notice": {"text": "Beers Added"}';



    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Add rating
$app->post('/api/rating/add', function(Request $request, Response $response){
    $aroma = $request->getParam('aroma');
    $appearance = $request->getParam('appearance');
    $taste = $request->getParam('taste');



    $sql = "INSERT INTO ratings (aroma,appearance,taste,overall) VALUES
    (:aroma,:appearance,:taste, :aroma+appearance+taste)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':aroma', $aroma);
        $stmt->bindParam(':appearance', $appearance);
        $stmt->bindParam(':taste',  $taste);



        $stmt->execute();

        echo '{"notice": {"text": "Rating added Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update Customer
$app->put('/api/beer/update/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $id = $request->getAttribute('beer');
    $ibu = $request->getParam('ibu');
    $calories = $request->getParam('calories');
    $abv = $request->getParam('abv');
    $style = $request->getParam('style');
    $location = $request->getParam('location');

    $sql = "UPDATE customers SET
				beer = :beer,
				ibu	= :ibu,
				calories 	= :calories,
                abv		= :abv,
                style		= :style,
                location	= :location
                
			WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':beer', $beer);
        $stmt->bindParam(':ibu', $ibu);
        $stmt->bindParam(':calories',  $calories);
        $stmt->bindParam(':abv',      $abv);
        $stmt->bindParam(':style',      $style);
        $stmt->bindParam(':location',    $location);

        $stmt->execute();

        echo '{"notice": {"text": "Beer Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Delete Customer
$app->delete('/api/beer/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "DELETE FROM beer WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Beer Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});