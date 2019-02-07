@extends('root')
@section('content')
<div class="container">
    @foreach($categories as $category)
        <div class="row">
            @foreach($category->articles as $article)
                <div class="col-lg-8 mx-auto article-in-category" v-on:click="navigate()">
                    <div class="col-lg-8 mx-auto">
                        <h2>{{$article->headline}}</h2>
                        <div class="mt-2">
                            <p>{{str_limit($article->content,200)}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@stop
