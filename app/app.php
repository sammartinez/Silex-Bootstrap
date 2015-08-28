<?php

        require_once __DIR__."/../vendor/autoload.php";
        require_once __DIR__."/../src/Brand.php";
        require_once __DIR__."/../src/Store.php";

        $server = 'mysql:host=localhost:8889;dbname=shoes';
        $username = 'root';
        $password = 'root';
        $DB = new PDO($server, $username, $password);

        $app = new Silex\Application();
        $app->register(new Silex\Provider\TwigServiceProvider(), array(
            'twig.path' => __DIR__."/../views"
        ));
        use Symfony\Component\HttpFoundation\Request;
        Request::enableHttpMethodParameterOverride();

        //Get Calls
        $app->get('/', function() use ($app) {

            return $app['twig']->render('index.html.twig');
        });

        //Post Calls

        //Brand Post Calls
        $app->post("/brands", function() use ($app) {
            $brand_name = $_POST['brand_name'];
            $new_brand = new Brand($name, $id = null);
            $new_brand->save();

            $store = Store::find($store_id);

            return $app['twig']->render('store.html.twig', array('store' => $store, 'brands' => $store->getBrands()));
        });

        //Store Post Calls
        $app->post("/stores", function() use ($app) {
            $store = new Store($_POST['store_name']);
            $store->save();

            return $app['twig']->render('index.html.twig', array('stores' => Store::getAll()));
        });

        //Patch Calls


    return $app;

?>
