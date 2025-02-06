<?php   
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $cart = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('user.cart', compact('cart'));
    }


    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if (!$product || $product->stock <= 0) {
            return redirect()->route('user.catalog')->with('error', 'Produk tidak tersedia.');
        }

        $quantity = max(1, min($request->quantity, $product->stock));

        // Cek apakah produk sudah ada di keranjang
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $id)
                        ->first();

        if ($cartItem) {
            // Validasi stok saat menambah kuantitas
            if ($cartItem->quantity + $quantity > $product->stock) {
                return redirect()->route('user.cart')->with('error', 'Stok tidak mencukupi.');
            }
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Tambahkan produk baru ke keranjang
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('user.cart')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function removeFromCart($id)
    {
        // Hapus produk dari database
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('user.cart')->with('success', 'Produk berhasil dihapus dari keranjang!');
        }

        return redirect()->route('user.cart')->with('error', 'Produk tidak ditemukan di keranjang.');
    }
}
