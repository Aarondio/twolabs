<?php

namespace App\Http\Controllers;

use App\Models\Cart as Carts;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\orders as MailOrder;

class Cart extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cart')->with([
            'carts' => Carts::where('completed', '0')->get(),
        ]);
    }

    public function addToCart(Request $request, Carts $cart)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'product_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $validated['price'] = $validated['quantity'] * $validated['price'];
        // dd($validated);
        $cart->create($validated);
        return redirect()->back()->withErrors('Unable to add item to cart');
    }

    public function updateCart(Request $request)
    {
        $productId = $request->query('id');
        $quantity = $request->query('quantity');
        $userId = Auth::user()->id;

        $cartItem = Carts::where('product_id', $productId)
            ->where('user_id', $userId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();
            // return redirect()->back()->withSuccess('Cart updated successfully');
            return response()->json(['success' => true, 'message' => 'Cart quantity updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Cart item not found']);
        // return redirect()->back()->withErrors("Unable to update quantity");

    }

    public function cartplus(Request $request)
    {
        $productId = $request->product_id;
        $userId = Auth::id();

        $product = Product::find($productId);
        $cartItem = Carts::where('product_id', $productId)
            ->where('user_id', $userId)
            ->where('completed', '0')
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->price = $product->price * $cartItem->quantity;
            $cartItem->save();
            return redirect()->back()->withSuccess('Cart updated');
            // return response()->json(['success' => true, 'message' => 'Cart quantity updated successfully']);
        }
        return redirect()->back()->withErrors("Unable to update quantity");
    }


    public function cartminus(Request $request)
    {
        $productId = $request->product_id;
        $userId = Auth::id();
        $product = Product::find($productId);
        $cartItem = Carts::where('product_id', $productId)
            ->where('user_id', $userId)
            ->where('completed', '0')
            ->first();

        if ($cartItem) {
            $cartItem->quantity -= 1;
            $cartItem->price = $product->price * $cartItem->quantity;
            $cartItem->save();
            return redirect()->back()->withSuccess('Cart updated');
        }
        return redirect()->back()->withErrors("Unable to update quantity");
    }

    public function checkout()
    {
        $id = Auth::id();
        $carts = Carts::where('user_id', $id)
            ->where('completed', '0')
            ->where('order_number', null)
            ->get();
        $total = 0;
        $order = Order::create([
            'order_number' => str_pad(rand(0, pow(10, 10) - 1), 10, '0', STR_PAD_LEFT),
            'user_id' => $id,
            'status' => 'Approved',
            'cost' => $total,
        ]);
        foreach ($carts as $cart) {
            $total += $cart->price;
            $cart->update([
                'completed' => '1',
                'order_number' => $order->order_number,
            ]);
        }
        $order->update([
            'cost' => $total,
        ]);

        
        // if ($order) {
        try {
            // dd($order);
            Mail::to('amodutaiwobolaji@gmail.com')->send(new MailOrder($order, 'Order placed by customer', 'An order has been placed'));
        } catch (\Exception $e) {
            Log::error("message", $e->getMessage());
        } finally {
            return redirect()->route('user_dashboard')->with(['success' => 'Your Order ' . $order->order_number . ' was placed successfully Successfully']);
        }
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $cart = Carts::find($id);
        if ($cart) {
            $cart->delete();
            return redirect()->back()->withSuccess("Cart deleted successfully");
        }
        return redirect()->back()->withErrors("Unable to delete id");
    }
}
