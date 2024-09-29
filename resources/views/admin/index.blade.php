@extends('admin.master')
@section('title', 'Dashboard | ' . env('APP_NAME'))

@section('content')
    <h1>Course Payment Revenue: </h1>
    <h2>&euro;{{ $revenue }}</h2>
    <hr>
    <h1>Notifications: ({{ Auth::user()->unreadnotifications->count() }})</h1>


    <div class="list-group">
        @foreach (Auth::user()->notifications as $noti)
            <a href="{{ route('admin.mark-as-read', $noti->id) }}" class="list-group-item list-group-item-action {{ $noti->read_at == null ? 'active' : '' }}">
              <h5>Name: {{ $noti->data['name'] }}</h5>
              <h5>Email: {{ $noti->data['email'] }}</h5>
              <h5>Subject: {{ $noti->data['subject'] }}</h5>
              <h5>Message: {{ $noti->data['message'] }}</h5>
            </a>
        @endforeach
    </div>









@endsection
