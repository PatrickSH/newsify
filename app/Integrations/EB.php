<?php

namespace App\Integrations;

use App\Integrations\Base;

class EB extends Base{

    private $url = "https://ekstrabladet.dk/";

    public function __construct($action){
        parent::__construct(true,'/plus');
        $this->$action();
    }

    public function getOne(){

    }

    public function getAll(){
        foreach($this->getArticleLinksFromOverview($this->url) as $article){
            $current = $this->getContentFromArticle($article,"#fnContentArea");
            $headline = $this->getHeadline($current,".art-title");
            $body = $this->getBodyText($current,"#fnBodytextTracking")->text();
            var_dump($body);die;
        }
    }
}
