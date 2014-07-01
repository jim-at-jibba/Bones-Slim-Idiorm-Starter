<?php
    session_cache_limiter(false);
    session_start();  //Start session for flash message use.


    require '../vendor/autoload.php';

    // Prepare app
    $app = new \Slim\Slim( array ( 'templates.path' => '../templates',
                           ) );

    // Create monolog logger and store logger in container as singleton
    // (Singleton resources retrieve the same log resource definition each time)
    $app->container->singleton( 'log', function () {
            $log = new \Monolog\Logger( 'slim-skeleton' );
            $log->pushHandler( new \Monolog\Handler\StreamHandler( '../logs/app.log', \Monolog\Logger::DEBUG ) );

            return $log;
        }
    );

    //DB set up
    ORM::configure( 'mysql:host=localhost;dbname=####' );
    ORM::configure( 'username', 'root' );
    ORM::configure( 'password', 'root' );
    ORM::configure('return_result_sets', true); // returns result sets


    // Prepare view
    $app->view( new \Slim\Views\Twig() );
    $app->view->parserOptions    = array ( 'charset'          => 'utf-8',
                                           'cache'            => realpath( '../templates/cache' ),
                                           'auto_reload'      => TRUE,
                                           'strict_variables' => FALSE,
                                           'autoescape'       => TRUE
    );
    $app->view->parserExtensions = array ( new \Slim\Views\TwigExtension() );

    // Define routes

    //get all
    $app->get( '/', function () use ( $app ) {
            // Sample log message
            $app->log->info( "Slim-Skeleton '/' route" );
            //Pull data from DB
            //$users = ORM::for_table('users')->find_result_set();
            // Render index view
            $app->render( 'index.twig');
        }
    );

    // Define routes - in separate files for better readability
    //require '../app/routes/index.php';

    // Run app
    $app->run();
