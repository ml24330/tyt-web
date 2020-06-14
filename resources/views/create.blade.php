<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Farewell Messages</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
            html, body {
                background-image: url({{ URL::asset('images/wallpaper.jpg') }});
                background-repeat: no-repeat;
                background-position: center;
                background-size: 1500px 800px;
                background-color: #fff;
                color: #636b6f;
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
                <a href='/about' style="color:white">About</a>
                @if (Route::has('login'))
                    @auth
                        <a href='/' style="color:white">Home</a>
                    @else
                        <a href='/' style="color:white">Home</a>
                        <a href="{{ route('login') }}" style="color:white">Login</a>
                    @endauth
                @endif
            </div>

            <div class="container">
                <h2 style="font-weight:bold;color:hotpink;font-family:helvetica">Create a farewell message here!</h2>
                <p style="color:lightgray;padding-bottom:1px">All messages submitted will be protected and only the designated teacher can view them. Contact me if you make any errors!</p>
                <form action="/post" enctype="multipart/form-data" method="post" id="f">
                @csrf
                    <div class="form-group row">
                        <label for="owner_name" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;color:white;font-family:helvetica">Your Name</label>

                        <div class="col-md-6">
                            <input id="owner_name" type="text" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ old('owner_name') }}" required autocomplete="owner_name">
                                @error('owner_name')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;color:white;font-family:helvetica">Who is this message for?</label>

                        <div class="col-md-6">
                            <select id="user_id" class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                                @foreach ($users as $user)
                                <option value='{{ $user->id }}'>{{ $user->username }}</option>
                                @endforeach

                                @error('user_id')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;color:white;font-family:helvetica">Message Title (optional)</label>

                        <div class="col-md-6">
                            <input id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"></input>

                                @error('title')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="body" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;color:white;font-family:helvetica">Your Message</label>

                        <div class="col-md-6">
                            <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" rows="6" cols="50" required></textarea>

                                @error('body')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right" style="font-weight:bold;color:white;font-family:helvetica">Image (optional)</label>
                        <div class="col-md-6">
                            <input type="file" class="form-control-file" id="image" name="image" style="color:white">
                            @error('image')
                                <span class="text-danger" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" style="margin-top:1%;font-weight:bold">Submit Message</button>
                    </div>
                </form>
            </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
