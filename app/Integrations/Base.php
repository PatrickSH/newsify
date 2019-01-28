<?php

namespace App\Integrations;

use Goutte;

abstract class Base
{
    private $has_premium_content;

    private $premium_content_keyword;

    public function __construct($has_premium_content, $premium_content_keyword){
        $this->has_premium_content = $has_premium_content;
        $this->premium_content_keyword = $premium_content_keyword;
    }

    public function getContentFromArticle($url, $find){
        $crawler = Goutte::request('GET', $url);
        return $crawler->filter($find)->first();
    }

    public function getArticleLinksFromOverview($url){
        $crawler = Goutte::request('GET', $url);
        $links = [];
        $crawler->filter('.df-article-content a')->each(function ($node) use(&$links){

            if($this->has_premium_content && strpos($node->attr('href'),$this->premium_content_keyword) !== FALSE) return false; //Premium content string

            if(!in_array($node->attr('href'),$links)) array_push($links,$node->attr('href'));
        });

        return $links;
    }

    public function getHeadline($article,$find){
        if(count($article->filter($find)) > 0) return $article->filter($find)->first()->text();
    }

    public function getBodyText($article,$find){
        try{
            $text = "";
            $body = $article->filter($find)->filter("p")->each(function($node) use(&$text){
                if(count($node->children()) > 0) return false; //Sort p tags with children away.
                $text .= $node->text();
            });
            return $text;
        }catch(Exception $e){
            return "error";
        }

    }

}
