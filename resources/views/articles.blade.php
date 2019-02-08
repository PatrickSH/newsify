@extends('root')
@section('content')
<div class="container">
    @foreach($categories as $category)
        <div class="row">
            @foreach($category->articles as $article)
                <div class="col-lg-8 mx-auto article-in-category" v-on:click="navigate('{{$article->link_internal}}')">
                    <div class="col-lg-8 mx-auto">
                        <h2>{{$article->headline}}</h2>
                        <div class="mt-2">
                            <p>{{str_limit($article->content,200)}}</p>
                        </div>
                        <div class="mt-1">
                            <p>Leveret af: <a href="{{$article->provider->link}}">{{$article->provider->name}}</a></p>
                            <p>Orginal artikel kan findes: <a href="{{$article->link_external}}">Her</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@stop
