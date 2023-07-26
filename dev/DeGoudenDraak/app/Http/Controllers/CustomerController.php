<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Dish;
use App\Models\DishType;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer/index');
    }

    public function createOrder(Request $request)
    {
        $request->validate([
            'tablenumber' => 'required|max:99',
        ]);

        $order = new Order([
            'table_number' => $request->get('tablenumber')
        ]);

        $order->save();
        return redirect('customer/order/'.$order->id);
    }

    public function order(string $orderId)
    {
        try{
            return view('customer/order', ['order' => Order::find($orderId),
            'dishTypes' => DishType::all()->sortBy('id'),
            'dishes' => Dish::all()->sortBy('name')]);
        }
        catch(\Exception $e){
            throw $e;
        }
                                        
    }

    public function addToOrder(Request $request, $orderId, $dishId)
    {
        $request->validate([
            'amount' => 'required'
        ]);

        $dish = Dish::findOrFail($dishId);

        Order::findOrFail($orderId)->dishes()->save($dish, ['amount' => $request->get('amount')]);
        return redirect('customer/order/'. $orderId)->with('success', $dish->name.' toegevoegd');
    }
}