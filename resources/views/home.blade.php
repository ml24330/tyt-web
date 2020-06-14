@extends('layouts.app')
<style>
    html, body {
        background-image: linear-gradient(to top, aqua, lightblue);
    }
    a:visited{
        color:darkred;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your messages</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Welcome, {{ $user->username ?? 'N/A' }}!</p>
                    <p>Amidst the ongoing pandemic, students from the Class of 2020 did not get to enjoy their last day of school, and are at risk of missing their graduation ceremony. As a part of this class, I have developed this website for students to share their thoughts, express their gratitude, and say farewell to respected teachers like you. More information can be found on the About page.</p>
                    @if(sizeof($user->messages)!=0)
                        <p>Anyway, you have received messages from the following people - click to view them!</p>
                        @foreach ([$user->messages, $global_messages] as $messages)
                        @foreach ($messages as $message)
                        <div class="row" style="padding-left:5%;padding-top:0.1%">
                        <a href="/m/{{ $message['id'] }}">Message from {{ $message['owner_name'] }}</a>
                        </div>
                        @endforeach
                        @endforeach
                        <div class="row" style="padding-left:80%;padding-top:1%;font-size:12px;text-align:center">
                            <img src="/images/pdf-icon.png" style="width:27px;height:auto;margin-bottom:2%;margin-left:42%">
                            <a href="/download" style="line-height:15px">Click here to download all messages!</a>
                        </div>
                    @else
                        <p>Whoops, seems like you have not received any messages yet! ;(</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
