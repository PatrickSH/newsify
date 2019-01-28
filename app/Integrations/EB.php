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

    private function getImage($current){
        try{
            if(count($current->children()->filter(".article-top .figure")) > 0) return $current->children()->filter(".article-top .figure")->first()->children()->first()->attr("src");
        }catch(\InvalidArgumentException $e){
            return 'error';
        }
    }

    public function getAll(){
        $articles = [];
        foreach($this->getArticleLinksFromOverview($this->url) as $article){
            try{
                $current = $this->getContentFromArticle($article,"#fnContentArea");
                $headline = $this->getHeadline($current,".art-title");
                $thisArticle = [];
                $thisArticle['text'] = $this->getBodyText($current,".article-bodytext");
                $thisArticle['headline'] = $headline;
                $thisArticle['main_image'] = "https://ekstrabladet.dk/".$this->getImage($current);
                $thisArticle['link'] = $article;
                array_push($articles,$thisArticle);
            }catch(Exception $e){

            }
        }

        return $articles;
    }
}
