<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = OrderItem::with('order', 'product')
            ->paginate(10);

        return view('pages.orders.index', [
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Order::getOrderTypes();
        $statuses = Order::getOrderStatuses();
        $users = User::get();

        return view('pages.orders.create', [
            'types' => $types,
            'statuses' => $statuses,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);*/

        $request_clean = $request->all();

        $order = Order::create([
            'customer' => $request_clean['customer'],
            'phone' => $request_clean['phone'],
            'user_id' => $request_clean['user_id'],
            'type' => $request_clean['type'],
            'status' => $request_clean['status'],
            'created_at' => date('Y-m-d H:i:s'),
            'completed_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('orders.edit', $order->id)
            ->with('success', 'Order updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = OrderItem::whereIn('order_id', [$id])
            ->with('order', 'product')
            ->get();

        return view('pages.orders.show', [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $order = OrderItem::whereIn('order_id', [$id])
            ->with('order', 'product')
            ->get();

        $types = Order::getOrderTypes();
        $statuses = Order::getOrderStatuses();
        $users = User::get();

        return view('pages.orders.edit', [
            'order' => $order[0],
            'types' => $types,
            'statuses' => $statuses,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        /*$request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);*/

        $request_clean = $request->all();

        Order::where('id', $id)
            ->update([
                'customer' => $request_clean['customer'],
                'phone' => $request_clean['phone'],
                'user_id' => $request_clean['user_id'],
                'type' => $request_clean['type'],
                'status' => $request_clean['status'],
                'completed_at' => date('Y-m-d H:i:s'),
            ]);

        return redirect()->route('orders.edit', $id)
            ->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $id)
    {
        Order::findOrFail($id)->delete();

        $page = $request->only('page')['page'];
        $route = 'orders/?page=' . $page;

        return redirect($route);
    }
}
