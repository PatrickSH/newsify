@extends('root')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="mt-5">
                <h2>{{$article->headline}}</h2>
            </div>
            <div class="mt-4">
                <img src="{{$article->image}}" onerror="this.style.display='none'"/>
            </div>
            <div class="mt-3">
                <span class="category-tag">{{$article->category->name}}</span>
            </div>
            <div class="mt-3">
                <p>{{$article->content}}</p>
            </div>
            <div class="mt-3 mb-5">
                <a href="{{$article->link_external}}" target="_blank">Original artikel</a>
            </div>
        </div>
    </div>
</div>
@stop
