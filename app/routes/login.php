<?php
    //Declare Routes
    $app->map( '/login', 'login' )->via( 'GET', 'POST' )->name( 'login' );
    $app->get( '/logout', 'logout' );

    function login()
    {
        $app = Slim\Slim::getInstance();
        $username = null;

        if ($app->request()->isPost()) {
            $username = $app->request->post( 'username' );
            $password = $app->request->post( 'password' );

            $result = $app->authenticator->authenticate( $username, $password );

            if ($result->isValid()) {
                $memId  = $result->getIdentity();
                $member = ORM::for_table( 'users' )->find_one( $memId['id'] );
                $member->set_expr( 'last_logged_in', time() );
                $member->save();
                $app->flash('LoggedIn', 'You are Logged in');
                $app->redirect( '/' );
            } else {
                $messages = $result->getMessages();
                $app->flashNow( 'error', $messages[0] );
            }
        }

        $app->render( 'login/login.twig', array ( 'username' => $username ) );
    }

    function logout()
    {
        $app = Slim\Slim::getInstance();

        // Sample log message
        $app->log->info( "Slim-Skeleton '/logout' route" );


        if ($app->auth->hasIdentity()) {
            $app->auth->clearIdentity();
        }

        $app->redirect( '/' );

    }