<form
    action="{{ route('orders.store') }}"
    method="POST"
>
    @csrf

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 pt-5">
            <div class="form-group">
                <strong>Customer:</strong>
                <input
                    type="text"
                    name="customer"
                    class="form-control"
                    placeholder="customer"
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
                    placeholder="Phone"
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
                        <option value="{{ $user->id }}">
                            #{{ $user->id }}, {{ $user->name }}
                        </option>
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
                        <option value="{{ $type }}">{{ $type }}</option>
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
                        <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-left pt-5">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
