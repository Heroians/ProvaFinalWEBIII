<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Mostra apenas pedidos do usuário autenticado
        return $request->user()->orders()->with('products')->get();
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);
        return $order->load('products');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        $order = $request->user()->orders()->create();

        $order->products()->attach($data['products']);

        return response()->json($order->load('products'), 201);
    }

    public function update(Request $request, Order $order)
    {
        $this->authorize('update', $order);
        // Atualização de status, por exemplo
        $order->update($request->only('status'));
        return $order;
    }

    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        $order->delete();
        return response()->json(['message' => 'Pedido removido com sucesso']);
    }
}
