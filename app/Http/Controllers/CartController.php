<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SchoolDetail;
use App\Traits\SessionTrait;
use Illuminate\Http\Request;

class CartController extends Controller
{

    use SessionTrait;
    private $schoolDetails, $cart;

    public function __construct(SchoolDetail $schoolDetails, Cart $cart)
    {
        $this->schoolDetails = $schoolDetails;
        $this->cart = $cart;
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'book_id'  => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $adminSession = $this->getSchoolSession($request);
        $uuid = $adminSession['uuid'];
        $school = $this->schoolDetails->where('uuid', $uuid)->first();
        $totalPrice = $request->quantity * $request->price;
        $existingCartItem = $this->cart->where('book_id', $request->book_id)
            ->where('school_id', $school->id)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->update([
                'quantity'    => $existingCartItem->quantity + $request->quantity,
                'total_price' => $existingCartItem->total_price + $totalPrice,
            ]);

            return response()->json(['message' => 'Product quantity updated in cart', 'cart_item' => $existingCartItem]);
        } else {

            $cartItem = $this->cart->create([
                'school_id'   => $school->id,
                'book_id'     => $request->book_id,
                'quantity'    => $request->quantity,
                'price'       => $request->price,
                'total_price' => $totalPrice,
            ]);

            return response()->json(['message' => 'Item added to cart', 'cart_item' => $cartItem]);
        }
    }

    public function getCartProducts(Request $request)
    {
        $adminSession = $this->getSchoolSession($request);
        $uuid = $adminSession['uuid'];
        $school = $this->schoolDetails->where('uuid', $uuid)->first();
        $cartProducts = $this->cart->where('school_id', $school->id)
            ->with('book')
            ->get();

        return response()->json(['cartProducts' => $cartProducts]);
    }
}
