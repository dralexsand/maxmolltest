<form
    action="{{ route('orders.update', $order->id) }}"
    method="POST"
>
    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4>
                    Id: {{ $order->id }}
                    <br>
                    Created_at: {{ $order->order->created_at }}
                    <br>
                    Completed_at: {{ $order->order->completed_at }}
                </h4>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 pt-5">
            <div class="form-group">
                <strong>Customer:</strong>
                <input
                    type="text"
                    name="customer"
                    class="form-control"
                    placeholder="Enter Title"
                    value="{{ $order->order->customer }}"
                >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 pt-5">
            <div class="form-group">
                <strong>Phone:</strong>
                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    placeholder="Enter Title"
                    value="{{ $order->order->phone }}"
                >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 pt-5">
            <div class="form-group">
                <strong>User:</strong>
                <select
                    name="user_id"
                    class="form-select form-select-lg mb-3"
                >
                    @foreach($users as $user)
                        @if($user->id === $order->order->user_id)
                            <option selected value="{{ $user->id }}">
                                # {{ $user->id }}, {{ $user->name }}
                            </option>
                        @else
                            <option value="{{ $user->id }}">
                                #{{ $user->id }}, {{ $user->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 pt-5">
            <div class="form-group">
                <strong>Type:</strong>
                <select
                    name="type"
                    class="form-select form-select-lg mb-3"
                >
                    @foreach($types as $type)
                        @if($type === $order->order->type)
                            <option selected value="{{ $type }}">{{ $type }}</option>
                        @else
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 pt-5">
            <div class="form-group">
                <strong>Status:</strong>
                <select
                    name="status"
                    class="form-select form-select-lg mb-3"
                >
                    @foreach($statuses as $status)
                        @if($status === $order->order->status)
                            <option selected value="{{ $status }}">{{ $status }}</option>
                        @else
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-left pt-5">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
