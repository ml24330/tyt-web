<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>About</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: linear-gradient(to top right, silver, white);
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    <a href='/'>Home</a>
                    @if (Route::has('login'))
                    @auth
                        <a href='/index/{{ auth()->user()->id }}'>Index</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                    @endif
                </div>

            <div class="content">
                <div class="title">
                    About
                </div>
                    <div class="text" style="font-size:20px;font-family:arial;padding-top:2%;margin-left:12%;margin-right:12%">
                        <p>This website was developed by Mukun Liu using Laravel 7.13.0, an open-source PHP web framework. It was created for the purpose of allowing students to hand in virtual farewell cards to their teachers during this unprecedented pandemic. Authentication codes for teachers are safely encrypted, and messages written by students are protected by middleware so only designated teachers can view them.</p>
                        <p>Teachers need to login to view the messages they received. Sending a message requires no login and you should use the CREATE A MESSAGE button on the homepage.</p>

                        <strong>If you have any questions or queries, or have discovered any bugs, please contact me at <a href = "mailto: mukun.liu@outlook.com">mukun.liu@outlook.com</a></strong>.
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
