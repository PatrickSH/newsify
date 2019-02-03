<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Newsify</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/app.css?ver={{rand(1,1000)}}">
    </head>
    <body>
        <div id="app">
            <div class="container">
                <div class="country">
                    <div class="row flag-row">
                        <div class="col-lg-2 no-padding">
                            <div class="flag-in-overview">
                                <img src="svg/flags/denmark.svg"/>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            &nbsp;
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm mw-33 provider">
                            <h2>EB</h2>
                        </div>
                        <div class="col-sm mw-33 provider mr-5 ml-5">
                            <h2>BT</h2>
                        </div>
                        <div class="col-sm mw-33 provider">
                            <h2>TV2</h2>
                        </div>
                    </div>
                </div>
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
        </div>
    </body>
</html>
