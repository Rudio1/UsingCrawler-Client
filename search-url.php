<?php

use GuzzleHttp\Client;
use Rudio1\SearchingUrl\search;
use Symfony\Component\DomCrawler\Crawler;

require 'vendor/autoload.php';


$client = new Client(['base_uri' => 'https://www.alura.com.br/', 'verify' => false]);
$crawler = new Crawler();

$buscardor = new search($client, $crawler);
$cursos = $buscardor->search('/cursos-online-programacao/java');

foreach ($cursos as $curso) {
    echo $curso  . PHP_EOL;
}
