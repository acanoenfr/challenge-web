<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 04/02/2019
 * Time: 12:03
 */

require "../vendor/autoload.php";

$app = new \App\App();

$container = $app->getApp()->getContainer();

$container['db'] = function ($container) {
    return new \App\Database("localhost", "broadcaster", "root", "root", true);
};

$app->getApp()->get("/messages", function (\Slim\Http\Request $req, \Slim\Http\Response $res, array $args) {
    $res->withHeader('Content-Type', 'application/json; charset=UTF-8');
    $data = $this->db->query("SELECT * FROM messages", []);
    return $res->withJson($data);
})->setName("get_all_messages");

$app->getApp()->get("/messages/{id:[0-9]+}", function (\Slim\Http\Request $req, \Slim\Http\Response $res, array $args) {
    $res->withHeader('Content-Type', 'application/json; charset=UTF-8');
    $data = $this->db->query("SELECT * FROM messages WHERE id = :id", [
        "id" => $args["id"]
    ]);
    return $res->withJson($data);
})->setName("get_one_message");

$app->run();
