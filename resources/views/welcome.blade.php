<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Voyages</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            table, td, th {
                border: 1px solid;
            }
            td,th {
                padding: 5px 10px !important;
            }
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Voyages
                </div>
                <div class="row">
                    <form type="get" action="{{ url('/') }}">
                        <div class="col-md-10">
                            <input class="form-control" type="search" name="search" placeholder="search">
                        </div>
                        <div class="col-md-2">
                            <button class="btn" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div>
                        <h2>Plane</h2>
                        <table>
                            <thead>
                            <tr>
                                <th>number</th>
                                <th>departure</th>
                                <th>arrival</th>
                                <th>seat</th>
                                <th>gate</th>
                                <th>baggage drop</th>
                                <th>departure date</th>
                                <th>arrival date</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($voyages_plane as $voyage)
                                <tr>
                                    <td>{{$voyage->number}}</td>
                                    <td>{{$voyage->departure}}</td>
                                    <td>{{$voyage->arrival}}</td>
                                    <td>{{$voyage->seat}}</td>
                                    <td>{{$voyage->gate}}</td>
                                    <td>{{$voyage->baggage_drop}}</td>
                                    <td>{{$voyage->departure_date}}</td>
                                    <td>{{$voyage->arrival_date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h2>Bus</h2>
                        <table>
                            <thead>
                            <tr>
                                <th>number</th>
                                <th>departure</th>
                                <th>arrival</th>
                                <th>departure date</th>
                                <th>arrival date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($voyages_bus as $voyage)
                                <tr>
                                    <td>{{$voyage->number}}</td>
                                    <td>{{$voyage->departure}}</td>
                                    <td>{{$voyage->arrival}}</td>
                                    <td>{{$voyage->departure_date}}</td>
                                    <td>{{$voyage->arrival_date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h2>Train</h2>
                        <table>
                            <thead>
                            <tr>
                                <th>number</th>
                                <th>departure</th>
                                <th>arrival</th>
                                <th>seat</th>
                                <th>departure date</th>
                                <th>arrival date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($voyages_train as $voyage)
                                <tr>
                                    <td>{{$voyage->number}}</td>
                                    <td>{{$voyage->departure}}</td>
                                    <td>{{$voyage->arrival}}</td>
                                    <td>{{$voyage->seat}}</td>
                                    <td>{{$voyage->departure_date}}</td>
                                    <td>{{$voyage->arrival_date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
