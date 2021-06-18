@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Чат</h1>
        <div class="pt-5"></div>
        <form id="chat" action="{{ route('sendMessage') }}" method="POST">
            <label for="message" style="font-weight: bold; font-size: 18px">Введите сообщение</label>
            <input type="text" id="message" name="message" class="form-control mt-2">
            <div class="w-100">
                <input type="submit" class="btn btn-primary mt-2 float-right">
            </div>
            @csrf
        </form>

        <div class="messages">
            @foreach($messages as $message)
                <div class="message-group">
                    <label for="" class="message-title">{{ $message->user()->first()->name }}</label>
                    <span>{{ $message->message }}</span>
                </div>
            @endforeach
        </div>

@endsection

@section('scripts')
            <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
            <script src="{{ asset('js/pusher.js') }}"></script>
@endsection
