<?php
    session_cache_limiter( FALSE );
//    session_start(); //Start session for flash message use.
    date_default_timezone_set( 'UTC' );
    //error_reporting( -1 );
    ini_set( 'display_errors', 1 );
    ini_set( 'display_startup_errors', 1 );

    /**
     * Define some constants
     */
    define("DS", "/");
    define("ROOT", realpath(dirname(__DIR__)) . DS);
    define("VENDORDIR", ROOT . "vendor" . DS);
    define("ROUTEDIR", ROOT . "app" . DS . "routes" . DS);
    define("TEMPLATEDIR", ROOT . "app" . DS . "templates" . DS);


    require '../app/config/config.php';
    require '../vendor/autoload.php';

    use JeremyKendall\Password\PasswordValidator;
    use JeremyKendall\Slim\Auth\Adapter\Db\PdoAdapter;
    use JeremyKendall\Slim\Auth\Bootstrap;
    use JeremyKendall\Slim\Auth\Exception\HttpForbiddenException;

    // Create app
    $app = new \Slim\Slim( array (
        'templates.path'     => TEMPLATEDIR,
        // Debug is set to false to demonstrate custom error handling
        'debug'              => true,
        // Default identity storage is session storage. You MUST set the
        // following cookie encryption settings if you use the SessionCookie
        // middleware, which this example does
        'cookies.encrypt'    => true,
        'cookies.secret_key' => 'FZr2ucE7eu5AB31p73QsaSjSIG5jhnssjgABlxlVeNV3nRjLt',
    ) );

    //DB set up
    ORM::configure( 'mysql:host=localhost;dbname=' . DBNAME );
    ORM::configure( 'username', DBUSER );
    ORM::configure( 'password', DBPASS );
    ORM::configure( 'return_result_sets', true ); // returns result sets

    // Configure Slim Auth components
    $validator     = new PasswordValidator();
    $adapter       = new PdoAdapter( getDb(), 'users', 'username', 'password', $validator );
    $acl           = new \Auth\Acl();
    $authBootstrap = new Bootstrap( $app, $adapter, $acl );
    $authBootstrap->bootstrap();

    // Add the session cookie middleware after auth to ensure it's executed first
    $app->add( new \Slim\Middleware\SessionCookie() );

    // Handle the possible 403 the middleware can throw
    $app->error(
        function ( \Exception $e ) use ( $app ) {
            if ($e instanceof HttpForbiddenException) {
                return $app->render( '403.twig', array ( 'e' => $e ), 403 );
            }
            // You should handle other exceptions here, not throw them
            throw $e;
        }
    );


    // Grabbing a few things I want in each view
    $app->hook(
        'slim.before.dispatch',
        function () use ( $app ) {
            $hasIdentity = $app->auth->hasIdentity();
            $identity    = $app->auth->getIdentity();
            $role        = ( $hasIdentity ) ? $identity['role'] : 'guest';
            $memberClass = ( $role == 'guest' ) ? 'danger' : 'success';
            $adminClass  = ( $role != 'admin' ) ? 'danger' : 'success';

            $data = array (
                'hasIdentity' => $hasIdentity,
                'role'        => $role,
                'identity'    => $identity,
                'memberClass' => $memberClass,
                'adminClass'  => $adminClass,
            );
//            var_dump($data);
            $app->view->appendData( $data );
        }
    );


    // Create monolog logger and store logger in container as singleton
    // (Singleton resources retrieve the same log resource definition each time)
    $app->container->singleton( 'log', function () {
            $log = new \Monolog\Logger( 'slim-skeleton' );
            $log->pushHandler( new \Monolog\Handler\StreamHandler( '../logs/app.log', \Monolog\Logger::DEBUG ) );

            return $log;
        }
    );

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
            $app->render( 'index.twig' );
        }
    );

    /**
     * Include all files located in routes directory
     */
    foreach(glob(ROUTEDIR . '*.php') as $router) {
        require_once $router;
    }

    // Run app
    $app->run();


    /**
     * Creates database table, users and database connection
     *
     * @return \PDO
     */
    function getDb()
    {
        $db = ORM::get_db();


        return $db;
    }