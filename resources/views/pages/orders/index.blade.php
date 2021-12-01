@extends('layouts.app')

@section('title', 'Orders List')

@section('headerScripts')
    @parent
    {{--<link rel="stylesheet" href="{{ asset('css/orders.css') }}">--}}
@endsection

@section('content')
    <h1>List Orders</h1>
    <hr>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 pt-5">
            <a class="btn btn-primary" href="/orders/create">
                Create New Order
            </a>
        </div>
    </div>

    @include('components.errors')

    <hr>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>customer</th>
            <th>phone</th>
            <th>user_id</th>
            <th>type</th>
            <th>status</th>

            <th span="2">actions</th>
        </tr>
        </thead>
        <tbody>
        // id, customer, phone, created_at, completed_at, user_id, type, status
        @forelse($orders as $order)

            <tr>
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->order->customer }}</td>
                <td>{{ $order->order->phone }}</td>
                <td>
                    {{ $order->order->user_id }}
                </td>
                <td>{{ $order->order->type }}</td>
                <td>{{ $order->order->status }}</td>
                <td>
                    <form
                        method="GET"
                        action="{{ route('orders.edit', $order->order_id) }}">
                        @csrf

                        <button
                            class="btn btn-info"
                            type="submit"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                    </form>
                </td>
                <td>
                    <form
                        method="POST"
                        action="{{ route('orders.delete', $order->order_id) }}">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="page" value="{{ $orders->currentPage() }}">

                        <button
                            class="btn btn-danger"
                            type="submit"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>No data</td>
            </tr>
        @endforelse

        </tbody>
    </table>

    {{ $orders->links('pagination::bootstrap-4') }}

@endsection

@section('footerScripts')
    @parent
    {{-- <script src="{{ asset('js/orders.js') }}"></script>--}}
@endsection
