<?php

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once 'vendor/autoload.php';

$cliente = new Client(['verify' => false]);
