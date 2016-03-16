<?php

require_once dirname(__DIR__) . '/scripts/bootstrap.php';

$cache = new Memcached;
$cache->addServer($_ENV['MEMCACHED_PORT_11211_TCP_ADDR'], $_ENV['MEMCACHED_PORT_11211_TCP_PORT']);
if ($time = $cache->get('time')) {
    echo 'cached time ' . $time;
} else {
    $time = time();
    $cache->set('time', $time, 60);
    echo 'setted time ' . $time;
}

$mongo = new MongoClient('mongodb://' . $_ENV['MONGO_PORT_27017_TCP_ADDR']);
$database = $mongo->sample;
$collection = $database->events;
$collection->insert([
    'type' => 'visitor',
    'time' => new MongoDate(time())
]);

$cursor = $collection->find();
foreach ($cursor as $document) {
    var_dump($document);
}

