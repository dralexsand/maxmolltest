@extends('layouts.app')

@section('title', 'Orders Report')

@section('headerScripts')
    @parent
    {{--<link rel="stylesheet" href="{{ asset('css/orders.css') }}">--}}
@endsection

@section('content')
    <h1>Report Orders</h1>
    <hr>
@endsection

@section('footerScripts')
    @parent
    {{-- <script src="{{ asset('js/orders.js') }}"></script>--}}
@endsection
