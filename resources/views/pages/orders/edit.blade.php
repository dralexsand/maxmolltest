@extends('layouts.app')

@section('title', 'Edit Order')

@section('headerScripts')
    @parent
    {{--<link rel="stylesheet" href="{{ asset('css/orders.css') }}">--}}
@endsection

@section('content')
    <h1>Edit Order</h1>
    @include('components.errors')
    @include('components.btn_home')
    @include('components.order_edit_form')
@endsection

@section('footerScripts')
    @parent
    {{-- <script src="{{ asset('js/orders.js') }}"></script>--}}
@endsection
