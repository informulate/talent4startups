@extends('messenger.templates.base')
@section('subject')
    T4S: {{ $startup->name }} has been created!
@endsection

@section('body')
    Head over to your {!! link_to_route('startup_profile', 'Startup Profile', $startup->url) !!} check things out!
@endsection
