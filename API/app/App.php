<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 04/02/2019
 * Time: 12:02
 */

namespace App;


class App
{

    /**
     * @var \Slim\App
     */
    private $app;

    /**
     * App constructor.
     */
    public function __construct()
    {
        session_start();
        $this->app = new \Slim\App([
            "displayErrorDetails" => true
        ]);
    }

    /**
     * @return \Slim\App
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Run the application
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     */
    public function run()
    {
        $this->app->run();
    }

}
