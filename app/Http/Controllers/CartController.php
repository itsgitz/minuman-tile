<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Models\Cart;

class CartController extends Controller
{
    const ON_CART_STATUS    = 'On Cart';
    const FINISH_STATUS     = 'Finish';

    //
    public function index(Request $r)
    {
        $this->saveCart($r);

        return view('client.cart', [
            'carts' => $this->getOnCart(),
        ]);
    }
 
    public function store(Request $r)
    {
        if (!Auth::check()) {
            $r->session()->put('menu_id', $r->menu_id);
            $r->session()->put('redirect_before_cart', true);

            return redirect()
                ->route('client_login_get');
        }

        $this->saveCart($r);
 
        return redirect()
            ->route('client_cart_get');
    }

    public function delete(Request $r)
    {
        $cart = Cart::find($r->cart_id);
        $cart->delete();

        return redirect()
            ->route('client_cart_get')
            ->with('cart_delete_message', 'Item dalam keranjang telah dihapus');
    }


    public function getOnCartCount()
    {
        $carts = $this->getOnCart();


        return $carts->count();
    }


    private function getOnCart()
    {
        $carts = DB::table('carts')
            ->join('clients', 'carts.client_id', '=', 'clients.id')
            ->join('menus', 'carts.menu_id', '=', 'menus.id')
            ->where('clients.id', '=', Auth::id())
            ->where('carts.status', '=', self::ON_CART_STATUS)
            ->select(
                'carts.id',
                'menus.name AS menu_name',
                'carts.quantity AS cart_quantity',
                'menus.price AS menu_price'
            )
            ->get();


        return $carts;
    }

    private function saveCart(Request $r)
    {
        $menuId = '';

        //Save operation only allowed for logged in user
        if (Auth::check()) {

            //If user redirected to login from add cart item (home page)
            //or directly add an item from home page
            //Run the save operation
            if ( $r->session()->has('redirect_before_cart') || isset( $r->menu_id ) ) {

                //Get the menu_id, redirected from login page, get from session
                if ( $r->session()->has('menu_id') ) {
                    $menuId = $r->session()->get('menu_id');

                } else {
                    //Else, get menu_id from post input (home page)
                    $menuId = $r->menu_id;
                }

                //If item is exist on cart, only update the quantity
                if ( $this->isOnCartExist($r) ) {
                    
                    //Get current data for get the current quantity
                    $currentData = Cart::where([
                        'client_id' => Auth::id(),
                        'menu_id'   => $menuId,
                        'status'    => self::ON_CART_STATUS
                    ])->first();
 
                    //Update quantity (+1)
                    Cart::where('client_id', Auth::id())
                        ->where('menu_id', $menuId)
                        ->where('status', self::ON_CART_STATUS)
                        ->update([
                            'quantity' => ( $currentData->quantity + 1 )
                        ]);

                } else {
                    //If item is not exist on cart, create new item on cart
                    $cart = new Cart;
                    $cart->client_id    = Auth::id();
                    $cart->menu_id      = $menuId;
                    $cart->status       = self::ON_CART_STATUS;
                    $cart->quantity     = 1;
                    $cart->save();
                }

                $this->destroyCartSession($r);

            }  else {
                //Don't run the save operation if not redirected from add cart item
                $this->destroyCartSession($r);
            }
        } else {
            //Don't run the save operation if user is not logged in
            $this->destroyCartSession($r);
        }
    }

    private function isOnCartExist(Request $r)
    {
        $carts = Cart::where([
            'client_id' => Auth::id(),
            'menu_id'   => $r->menu_id,
            'status'    => self::ON_CART_STATUS
        ])->first();

        if ( !isset( $carts ) ) {
            return false;
        } else {
            return true;
        }
    }

    private function destroyCartSession(Request $r)
    {
        //Destroy the redirect session
        $r->session()->forget('menu_id');
        $r->session()->forget('redirect_before_cart');
        $r->session()->forget('redirect_to');
    }
}
