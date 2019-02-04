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

$app->getApp()->post("/messages/new", function (\Slim\Http\Request $req, \Slim\Http\Response $res, $args) {
    $res->withHeader('Content-Type', 'application/json; charset=UTF-8');
    $content = trim(stripcslashes(htmlentities($req->getParam('content'))));
    $image = trim(stripcslashes(htmlentities($req->getParam('image'))));
    $user_id = trim(stripcslashes(htmlentities($req->getParam('user_id'))));
    if (empty($content)) {
        return $res->withJson([
            "error" => "Content parameter is not correct.",
            "executed_at" => (new DateTime())->format('Y-m-d H:i:s')
        ]);
    }
    if (empty($user_id)) {
        return $res->withJson([
            "error" => "User id parameter is not correct.",
            "executed_at" => (new DateTime())->format('Y-m-d H:i:s')
        ]);
    }
    $this->db->query("INSERT INTO messages(content, image, user_id) VALUES(:content, :image, :user_id)", [
        "content" => $content,
        "image" => $image,
        "user_id" => $user_id
    ]);
    return $res->withJson([
        "success" => "Your message is published.",
        "executed_at" => (new DateTime())->format('Y-m-d H:i:s')
    ]);
})->setName("messages_add");

$app->getApp()->put("/messages/update/{id:[0-9]+}", function (\Slim\Http\Request $req, \Slim\Http\Response $res, $args) {
    $res->withHeader('Content-Type', 'application/json; charset=UTF-8');
    $content = trim(stripcslashes(htmlentities($req->getParam('content'))));
    $image = trim(stripcslashes(htmlentities($req->getParam('image'))));
    if (empty($content)) {
        return $res->withJson([
            "error" => "Content parameter is not correct.",
            "executed_at" => (new DateTime())->format('Y-m-d H:i:s')
        ]);
    }
    $this->db->query("UPDATE messages SET content = :content, image = :image WHERE id = :id", [
        "content" => $content,
        "image" => $image,
        "id" => $args['id']
    ]);
    return $res->withJson([
        "success" => "Your message is updated.",
        "executed_at" => (new DateTime())->format('Y-m-d H:i:s')
    ]);
})->setName("messages_update");

$app->getApp()->delete("/messages/delete/{id:[0-9]+}", function (\Slim\Http\Request $req, \Slim\Http\Response $res, $args) {
    $res->withHeader('Content-Type', 'application/json; charset=UTF-8');
    $this->db->query("DELETE FROM messages WHERE id = :id", [
        "id" => $args['id']
    ]);
    return $res->withJson([
        "success" => "Your message is deleted.",
        "executed_at" => (new DateTime())->format('Y-m-d H:i:s')
    ]);
})->setName("messages_delete");

$app->run();
