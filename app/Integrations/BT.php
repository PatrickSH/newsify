<?php

namespace App\Integrations;

use App\Integrations\Base;

class BT extends Base{

    private $url = "https://www.bt.dk/";

    public function __construct(){
        parent::__construct(false,'');
    }

    public function getOne(){

    }

    private function getImage($current){
        try{
            if(count($current->children()->filter(".article-image-main")) > 0) return $current->children()->filter(".article-image-main")->first()->children()->first()->attr("href");
        }catch(\InvalidArgumentException $e){
            return 'error';
        }
    }

    public function getAll(){
        $articles = [];
        foreach($this->getArticleLinksFromOverview($this->url,".front article a") as $article){
            try{
                $current = $this->getContentFromArticle($article,".article-container");

                $headline = $this->getHeadline($current,".article-title");
                $thisArticle = [];
                $thisArticle['text'] = $this->getBodyText($current,".article-content");
                $thisArticle['headline'] = $headline;
                $thisArticle['main_image'] = $this->getImage($current);
                $thisArticle['link'] = $article;
                $thisArticle['category'] = trim($this->getCategory($current,".article-meta"));
                array_push($articles,$thisArticle);
            }catch(Exception $e){

            }
        }

        return $articles;
    }
}
