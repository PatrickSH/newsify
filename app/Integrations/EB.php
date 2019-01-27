<?php

namespace App\Integrations;

use App\Integrations\Base;

class EB extends Base{

    private $url = "https://ekstrabladet.dk/";

    public function __construct($action){
        parent::__construct(true,'/plus');

        var_dump($this->$action());
    }

    public function getOne(){

    }

    public function getAll(){
        $articles = [];
        foreach($this->getArticleLinksFromOverview($this->url) as $article){
            try{
                $current = $this->getContentFromArticle($article,"#fnContentArea");
                $headline = $this->getHeadline($current,".art-title");
                $text = "";
                $thisArticle = [];
                $body = $this->getBodyText($current,".article-bodytext")->filter("p")->each(function($node) use(&$text){
                    if(count($node->children()) > 0) return false; //Sort p tags with children away.
                    $text .= $node->text();
                });
                $thisArticle['text'] = $text;
                $thisArticle['headline'] = $headline;
                $thisArticle['link'] = $article;
                array_push($articles,$thisArticle);
            }catch(Exception $e){

            }
        }

        return $articles;
    }
}
