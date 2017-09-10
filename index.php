<?php
/**
 * Mindar Framework (https://framework.mindar.io)
 *
 * @link      https://github.com/damnedx/MindarFramework
 * @copyright Copyright (c) 2017-2018 damnedx
 * @license   MIT License
 */
require 'vendor/autoload.php';

use Mindar\Core\App;
$app = new App();

$app->get('/home', function() {
    echo 'bonjour' ;
});

$app->get('/test/:id/:name', function($id, $name) {
    echo 'hello : '. $name . '<br />';
    echo 'age : '. $id . '<br />';
})->with("id", "[0-9]")
  ->with("name","[0-2]");



$app->run();
