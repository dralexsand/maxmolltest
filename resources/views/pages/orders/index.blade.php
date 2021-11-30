@extends('layouts.app')

@section('title', 'Orders List')

@section('headerScripts')
    @parent
    {{--<link rel="stylesheet" href="{{ asset('css/orders.css') }}">--}}
@endsection

@section('content')
    <h1>List Orders</h1>
    <hr>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">order_id</th>
            <th scope="col">product_id</th>
            <th scope="col">count</th>
            <th scope="col">product_name</th>
            <th scope="col">price</th>
            <th scope="col">discount</th>
            <th scope="col">stock</th>
        </tr>
        </thead>
        <tbody>

        @forelse($orders as $order)

            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->product_id }}</td>
                <td>{{ $order->count }}</td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->discount }}</td>
                <td>{{ $order->stock }}</td>
            </tr>
        @empty
            <tr>
                <td>No data</td>
            </tr>
        @endforelse

        </tbody>
    </table>

@endsection

@section('footerScripts')
    @parent
    {{-- <script src="{{ asset('js/orders.js') }}"></script>--}}
@endsection
