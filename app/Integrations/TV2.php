<?php

namespace App\Integrations;

use App\Integrations\Base;

class TV2 extends Base{

    private $url = "http://tv2.dk/";

    public function __construct(){
        parent::__construct(true,'lige-nu');
    }

    public function getOne(){

    }

    private function getImage($current){
        try{
            if(count($current->children()->filter(".o-media picture img")) > 0) return $current->children()->filter(".o-media picture img")->first()->attr("src");
        }catch(\InvalidArgumentException $e){
            return 'error';
        }
    }

    public function getAll(){
        $articles = [];
        foreach($this->getArticleLinksFromOverview($this->url,".tv2-main article a") as $article){

            try{
                $current = $this->getContentFromArticle($article,".tv2-main");
                $headline = $this->getHeadline($current,".o-article_headline");
                $thisArticle = [];
                $thisArticle['text'] = $this->getBodyText($current,".rich-content");
                $thisArticle['headline'] = $headline;
                $thisArticle['main_image'] = $this->getImage($current);
                $thisArticle['link'] = $article;
                $thisArticle['category'] = $this->getCategory($current,".o-article_label");
                array_push($articles,$thisArticle);
            }catch(Exception $e){

            }
        }

        return $articles;
    }
}
