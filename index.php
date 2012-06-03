<?php

require './SplClassLoader.php';

$classLoader = new SplClassLoader('AdamQuaile\PrettyRest', './src/');
$classLoader->register();


use AdamQuaile\PrettyRest\Rst2XmlParser;

$parser = new Rst2XmlParser();
$parser->createDocumentFromFile('tests/sample-data/example.rst');