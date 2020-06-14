@extends('layouts.app')
<style>
    html, body {
        background-image: linear-gradient(to top, aqua, lightblue);
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Message from {{ $message['owner_name'] }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!$message['title']==null)
                    <p style="font-size:20px;font-weight:bold">{{ $message['title'] }}</p>
                    @endif
                    @if($message['user_id']==67)
                    <p style="font-size:17px;font-style:italic">(This message was sent to all teachers)</p>
                    @endif
                    {{ $message['body'] }}<br>
                    @if(!$message->image==null)
                    <img src='/{{ $message->image }}' style="padding-top:3%;width:90%;height:auto"><br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
