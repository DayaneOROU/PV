@extends('layout')

@isset($header)
    @section('heading')
        {{ $header }}
    @endsection
@endisset

@section('content')
    {{ $slot }}
@endsection
