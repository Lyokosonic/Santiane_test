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
                background-color: #fff !important;
                color: white;
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
        <div class="flex-center position-ref">
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
                    @foreach ($voyages as $voyage)
                        <h2>{{ $voyage->name }}</h2>
                        <p>{{ $voyage->description }}</p>

                        <table>
                            <thead>
                            <tr>
                                <th>type</th>
                                <th>transport_number</th>
                                <th>departure_date</th>
                                <th>arrival_date</th>
                                <th>departure</th>
                                <th>arrival</th>
                                <th>seat</th>
                                <th>gate</th>
                                <th>baggage_drop</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($voyage->steps as $step)
                                    <tr>
                                        <td>{{ $step->type }}</td>
                                        <td>{{ $step->transport_number }}</td>
                                        <td>{{ $step->departure_date }}</td>
                                        <td>{{ $step->arrival_date }}</td>
                                        <td>{{ $step->departure }}</td>
                                        <td>{{ $step->arrival }}</td>
                                        <td>{{ $step->seat }}</td>
                                        <td>{{ $step->gate }}</td>
                                        <td>{{ $step->baggage_drop }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
