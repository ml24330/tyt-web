<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .backdrop {
                position: fixed;
                bottom: 0px;
                left: 0px;
                width: auto;
                height: 160%;
                opacity: .15;
                z-index:-1;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="backdrop"><img src="images/background2.jpeg"></div>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href='/about'>About</a>
                @if (Route::has('login'))
                    @auth
                        <a href='/index/{{ auth()->user()->id }}'>Index</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>

            <div class="content">
                <div class="title m-b-md">
                    Farewell Messages
                </div>

                <div class="links">
                    <a href="/post/create" style="padding:1%;color:red;border:solid;border-width:medium;border-color:coral">Create a message</a>
                </div>
            </div>
        </div>
    </body>
</html>
