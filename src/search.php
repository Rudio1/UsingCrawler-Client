<?php

namespace Rudio1\SearchingUrl;


use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class search
{

        /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function search(string $url) : array {
        $resposta = $this->httpClient->request('GET', $url);

        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);

        $contentFilter = $this->crawler->filter('span.card-curso__nome');
        $content = [];

        foreach ($contentFilter as $elemento) {
            $content[] = $elemento->textContent;
        }

        return $content;
    }
}