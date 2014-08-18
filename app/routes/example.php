<?php

    //Declare Routes
    $app->get( '/example', 'getItems' );
    $app->get( '/example/:id', 'getItem' );
    $app->map( '/example-new', 'newexample' )->via( 'GET', 'example' );
    $app->map( '/example/:id/edit', 'putexample' )->via( 'GET', 'PUT' );
    $app->get( '/example/:id/delete', 'deleteexample' );


    function getItems()
    {
        $app = Slim\Slim::getInstance();

        // Sample log message
        $app->log->info( "Slim-Skeleton '/example' route" );

        //Pull data from example
        $example = ORM::for_table( 'example-table' )->find_result_set();
        //var_dump($example);

        // Render index view
        $app->render( 'example/example.twig', array ( 'example' => $example ) );
    }

    function getItem( $id )
    {
        $app = Slim\Slim::getInstance();

        // Sample log message
        $app->log->info( "Slim-Skeleton '/example' route" );

        //Pull data from example
        $example = ORM::for_table( 'example-table' )->find_one( $id );
        //var_dump( $example );

        // Render index view
        $app->render( 'example/example-single.twig', array ( 'example' => $example ) );
    }

    function newexample()
    {
        $app = Slim\Slim::getInstance();

        // Sample log message
        $app->log->info( "Slim-Skeleton '/example' route" );

        if ($app->request()->isexample()) {
            //Pull data from example
            $example           = ORM::for_table( 'example-table' )->create();
            $example->title    = $_example['title'];
            $example->body = $_example['body'];
            $example->set_expr( 'created_on', time() ); //Change to timestamp

            $example->save();
            // Render index view
            $app->redirect( '/example' );
        } else {
            $app->render( 'example/example-new.twig' );
        }


    }


    //put - update example
    function putexample( $id )
    {
        $app = Slim\Slim::getInstance();

        // Sample log message
        $app->log->info( "Slim-Skeleton '/example' route" );

        if ($app->request()->isPut()) {
            //Pull data from example
            $example           = ORM::for_table( 'example-table' )->create();
            $example->title    = $_example['title'];
            $example->markdown = $_example['markdown'];
            $example->html     = Parsedown::instance()->text( $_example['markdown'] );
            $example->set_expr( 'created_on', time() ); //Change to timestamp

            $example->save();
            // Render index view
            $app->redirect( '/example' );
        } else {

            //Pull data from example
            $example = ORM::for_table( 'example-table' )->find_one( $id );
            //var_dump( $example );

            // Render index view
            $app->render( 'example/example-update.twig', array ( 'example' => $example ) );
        }


    }

    //delete example
    function deleteexample( $id )
    {
        $app = \Slim\Slim::getInstance();

        // Sample log message
        $app->log->info( "Slim-Skeleton '/example/delete' route" );

        $example = ORM::for_table( 'example-table' )->find_one( $id );
        $example->delete();

        $app->flash('deleted', 'example has been deleted');
        $app->redirect( '/example' );
    }
