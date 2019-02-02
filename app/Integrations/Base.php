<?php

namespace App\Integrations;

use Goutte;

abstract class Base
{
    private $has_premium_content;

    private $premium_content_keyword;

    private $settings;

    public function __construct($has_premium_content, $premium_content_keyword, $settings){
        $this->has_premium_content = $has_premium_content;
        $this->premium_content_keyword = $premium_content_keyword;

        $standardSettings =
        [
            'ignore_link_strings' => [],
        ];
        $this->settings = array_replace($standardSettings,$settings);
    }

    public function getContentFromArticle($url, $find){
        $crawler = Goutte::request('GET', $url);
        return $crawler->filter($find)->first();
    }

    public function getArticleLinksFromOverview($url,$filter){
        $crawler = Goutte::request('GET', $url);
        $links = [];
        $crawler->filter($filter)->each(function ($node) use(&$links){

            if($this->has_premium_content && strpos($node->attr('href'),$this->premium_content_keyword) !== FALSE) return false; //Premium content string
            if(!empty($this->settings['ignore_link_strings'])){ //If there is a string in this array in url return false
                foreach($this->settings['ignore_link_strings'] as $string){
                    if(strpos($node->attr('href'),$string) !== FALSE) return false;
                }
            }
            if(!in_array($node->attr('href'),$links)) array_push($links,$node->attr('href'));
        });

        return $links;
    }

    public function getHeadline($article,$find){
        if(count($article->filter($find)) > 0) return $article->filter($find)->first()->text();
    }

    public function getCategory($article,$find){
        try{
            if(count($article->filter($find)->filter("a")) > 0) return $article->filter($find)->filter("a")->first()->text();;
        }catch(Exception $e){
            return "error";
        }
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
