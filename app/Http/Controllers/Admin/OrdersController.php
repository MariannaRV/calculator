<?php
/**
 * Created by PhpStorm.
 * User: vlastit
 * Date: 18.12.18
 * Time: 12:28
 */

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Role;
use App\Status;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

//use App\Role;

class OrdersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewOrders()
    {
        $user = Auth::user();
        $allOrders = Order::getOrders();
        return view('admin/viewOrders', ['user' => $user, 'allOrders' => $allOrders]);
    }

    public function createOrders(Request $request)
    {
        Order::createOrder($request);
        return 'all ok';
    }

    public function deleteOrder($id)
    {
        Order::deleteOrder($id);
        return redirect()->route('viewOrders');
    }

    public function editOrder($id)
    {
        $user = Auth::user();
        $order = Order::getOrderById($id);
        $statuses = Status::getStatuses();
        return view('admin/editOrder', [
            'order' => $order,
            'user' => $user,
            'statuses' => $statuses
        ]);

    }

    public function updateOrder(Request $request)
    {
        Order::updateOrder($request);
        return redirect()->route('viewOrders');
    }

    public function buyFromCart()
    {
        $productsFromCart = Cart::getCart();
        foreach ($productsFromCart as $value){
            json_encode($value);
            Order::createOrderFromCart($value);
        }
        return Cart::resetCart();
    }

}