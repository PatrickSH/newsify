@extends('root')
@section('content')
            <div class="container">
                @foreach($countries as $country)
                    <div class="country">
                        <div class="row flag-row">
                            <div class="col-lg-2 no-padding">
                                <div class="flag-in-overview">
                                    <img src="svg/flags/{{$country->flag}}"/>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            @foreach($country->providers as $provider)
                                <div class="col-lg-3 provider mr-5" v-on:click="navigate('/{{str_slug($provider->name)}}')">
                                    <h2>{{$provider->name}}</h2>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <div class="country">
                    <div class="row flag-row">
                        <div class="col-lg-2 no-padding">
                            <div class="flag-in-overview">
                                <img src="svg/flags/slovakia.svg"/>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            &nbsp;
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm mw-33 provider">
                            <h2>CAS</h2>
                        </div>
                        <div class="col-sm mw-33 provider mr-5 ml-5">
                            <h2>MARKIZA</h2>
                        </div>
                    </div>
                </div>
            </div>
@stop
