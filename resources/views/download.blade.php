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
            }

            .backdrop {
                position: fixed;
                padding: 0 1000px 100px 0px;
                bottom: 0px;
                right: 0px;
                width: 100%;
                height: 100%;
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

            .message-title {
                margin:5% 5% 3% 5%;
                font-weight:bold;
                font-size:15px;
                word-wrap:break-word;
            }

            .message-body {
                font-weight:100;
                margin:3% 5% 3% 5%;
                word-wrap:break-word;
            }

            .message-end {
                text-algin:right;
                display:block;
                margin:3% 0 3% 83%;
                word-wrap:break-word;
            }

            .messages-title {
                margin:10%;
                font-weight:bold;
                font-size:15px;
                word-wrap:break-word;
            }

        </style>
    </head>
    <body>
        <div class="backdrop"><img src="images/background3.jpg"></div>
        <div class="container">
            <div class="messages-title">
        Dear {{ $data['user']->username }}:<br><br> This very document contains all of the messages that
         @if(sizeof($data['user']->messages)+sizeof($data['global_messages'])==1)
            a student has
         @else
            {{sizeof($data['user']->messages)+sizeof($data['global_messages'])}} students have
         @endif
            written to you from the Class of 2020. Feel free to do whatever you want with it!
        </div>

                    @foreach($data['user']->messages as $message)
                    <div style="page-break-before:always">
                <div class="row message-title"><br>
                    @if(!$message->title==null)
                    {{ $message['title'] }}
                    @endif
                </div>
                <div class="row message-body">
                    <br>{{ $message['body'] }}
                </div>
                    @if(!$message->image==null)
                    <div class="row message-body">
                    <br><img src='{{ $message->image }}' style="width:100%;height:auto;"><br>
                </div>
                    @endif
                    <div class="row message-end">
                    Message from: <p style="font-style:italic;margin:1%;font-weight:bold">{{ $message['owner_name'] }}</p>
                        </div>
                    </div>
                    @endforeach
                    @foreach($data['global_messages'] as $message)
                    <div style="page-break-before:always">
                <div class="row message-title"><br>
                    @if(!$message->title==null)
                    {{ $message['title'] }}
                    @endif
                </div>
                <div class="row message-body">
                    <p>(This message was sent to all teachers)</p>
                    <br>{{ $message['body'] }}
                </div>
                    @if(!$message->image==null)
                    <div class="row message-body">
                    <br><img src='{{ $message->image }}' style="width:100%;height:auto;"><br>
                </div>
                    @endif
                    <div class="row message-end">
                    Message from: <p style="font-style:italic;margin:1%;font-weight:bold">{{ $message['owner_name'] }}</p>
                        </div>
                    </div>
                    @endforeach


        </div>
    </body>
</html>
