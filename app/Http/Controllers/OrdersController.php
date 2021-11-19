<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Cart;
use App\Models\CartOrder;
use App\Models\Order;
use App\Models\Client;
use App\Models\Menu;
use App\Models\Stock;
use App\Models\MenuStock;


class OrdersController extends Controller
{
    const PAYMENT_STATUS    = [
        'paid'      => 'Paid',
        'unpaid'    => 'Unpaid',
    ];

    const DELIVERY_STATUS   = [
        'waiting'       => 'Waiting',
        'confirmed'     => 'Confirmed',
        'on_progress'   => 'On Progress',
        'ready'         => 'Ready',
        'delivery'      => 'Delivery',
        'finish'        => 'Finish',
        'failed'        => 'Failed',
    ];

    const FINISH_CART_STATUS = 'Finish';

    //
    //Admin source code for order controller
    //
    //
    public function adminIndex(Request $r)
    {
        $orders = DB::table('orders')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('menus', 'orders.menu_id', '=', 'menus.id')
            ->select(
                'orders.id',
                'menus.name AS menu_name',
                'orders.quantity',
                'clients.name AS client_name',
                'orders.payment_status',
                'orders.order_status',
                'orders.created_at'
            )
            ->get();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

    public function adminShow(Request $r, $id)
    {
        $order  = Order::find($id);
        $client = Client::find($order->client_id);
        $menu   = Menu::find($order->menu_id);

        $order->client_name = $client->name;
        $order->menu_name   = $menu->name;
        
        return view('admin.orders.show', [
            'order' => $order
        ]);
    }

    public function adminProcess(Request $r, $id)
    {
        $order = Order::find($id);

        switch($r->input('process')) {
            case 'Mark as Paid':
                $order->payment_status = 'Paid';
                $order->save();


                return redirect()
                    ->route('admin_orders_show', [ 'id' => $id ])
                    ->with('process_message', 'Payment status updated to Paid');
            break;

            case 'Mark as Finish':
                $order->order_status = 'Finish';
                $order->save();


                return redirect()
                    ->route('admin_orders_show', [ 'id' => $id ])
                    ->with('process_message', 'Order status updated to Finish');
            break;
        }
    }

    //
    //Client source code for order controller
    //
    //
    /* public function clientIndex(Request $r) */
    /* { */
    /*     return view('client.orders.index', [ */
    /*         'user' => Auth::user(), */
    /*     ]); */
    /* } */

    /* //Client per order details */
    /* public function clientShow($id) */
    /* { */

    /* } */

    //Client order process
    public function clientProcess(Request $r)
    {

        $r->validate(
            [
                'cart_delivery_method'  => ['required'],
                'cart_payment_method'   => ['required']
            ],
            [
                'cart_delivery_method.required' => 'Mohon untuk memilih metode pengiriman',
                'cart_payment_method.required'  => 'Mohon untuk memilih method pembayaran'
            ],
        );
        
        
        //Get order(id) after created an order
        $orderId = $this->saveOrder($r);
        $this->saveCartOrder($r, $orderId);

        var_dump($orderId);
                        
        
        /* //Menu Stocks process, reduce quantity */
        /* $menuStocks = MenuStock::where('menu_id', $menuId)->get(); */
         
        /* //Reduce quantity = Order quantity * Applied quantity */
        /* //Current quantity = Reduce quantity - Current quantity */
        /* foreach ($menuStocks as $ms) { */
        /*     $stock = Stock::find($ms->stock_id); */

        /*     $reduceQuantity = ( $orderQuantity * $ms->quantity ); */
        /*     $currentQuantity = ( $stock->quantity - $reduceQuantity ); */

        /*     $stock->quantity = $currentQuantity; */
        /*     $stock->save(); */
        /* } */

        /* return redirect() */
        /*     ->route('client_home') */
        /*     ->with('order_message', 'Your order is being process'); */
    }

    private function saveOrder(Request $r)
    {
        $order = new Order;
        $order->client_id       = Auth::id();
        $order->total_amount    = $r->cart_total_amount;
        $order->payment_status  = self::PAYMENT_STATUS['unpaid'];
        $order->payment_method  = $r->cart_payment_method;
        $order->delivery_type   = $r->cart_delivery_method;
        $order->delivery_status = self::DELIVERY_STATUS['waiting'];
        $order->save();

        return $order->id;
    }

    private function saveCartOrder(Request $r, $orderId)
    {
        foreach ($r->carts as $c) {
            //Change cart status to 'Finish'
            Cart::find($c['cart_id'])
                ->update(['status' => self::FINISH_CART_STATUS]);

            //Add data to cart_orders table
            CartOrder::create([
                'order_id'  => $orderId,
                'cart_id'   => $c['cart_id']
            ]);
        }
    }
}
