@extends('root')
@section('content')
<div class="container">
    <div class="category">
        <div class="row header-row">
            <div class="col-lg-2 no-padding">
                <h1>{{$providerName}}</h1>
            </div>
            <div class="col-lg-10">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <?php $count = 0; ?>
            @foreach($categories as $category)
                <div class="col-lg-3 mr-3 single-category">
                    <h2>{{$category['name']}}</h2>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop
