<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Order;

class ProductsController extends Controller
{
    //
    public function index() {
        return Inertia::render('Products');
    }
    
    public function borrarProducto(Request $request) {
        if($request->has('id') ) {
            Product::find($request->input('id'))->delete();
            return redirect()->back();
            
        }
    }

    public function store(Request $request) {
        $newRegularProduct = New Product();
        $newRegularProduct->name = $request->name;
        $newRegularProduct->img = $request->img;
        $newRegularProduct->qty = $request->qty;
        $request->file('img')->store('fotos-productos');
        $newRegularProduct->save();
        return Inertia::render('ProductCreated');
    }

    public function update(Request $request) {
        if($request->has('id') ) {
            Product::find($request->input('id'))->update($request->all());
            return redirect()->back();
        }
    }

    public function edit(Request $request) {
        $productToGet = Product::find($request->input('id'));
        return Inertia::render('EditProduct', ['productToGet' => $productToGet]);
    }


    public function verificar() {
        $allOrders = Order::all();
        return Inertia::render('Verify', ['allOrders' => $allOrders]);
    }

    public function return() {
        return redirect()->back();
    }

    public function list() {
        $allProducts = Product::all();
        return Inertia::render('ProductList', ['allProducts' => $allProducts]);
    }

    public function listt() {
        $allProducts = Product::all();
        return Inertia::render('ProductList', ['allProducts' => $allProducts]);
    }

    public function ordenCompra(Request $request) {
        // $newProductsOrder = 
        $allSuppliers = Supplier::all();
        return Inertia::render('OrdenCompra', ['allSuppliers' => $allSuppliers]);
    }

    public function ordenCompraPost(Request $request) {
        $nuevaOrdenCompra = New Order();
        $nuevaOrdenCompra->product_name = $request->productName;
        $nuevaOrdenCompra->quantity = $request->qty;
        $nuevaOrdenCompra->phone = $request->phone;
        $nuevaOrdenCompra->message = $request->message;
        $nuevaOrdenCompra->driver_dni = $request->driverDni;
        $nuevaOrdenCompra->driver_name = $request->driverName;
        $nuevaOrdenCompra->address = $request->address;
        $nuevaOrdenCompra->supplier_id = $request->supplier_id;
        // $request->file('img')->store('fotos-productos');
        $nuevaOrdenCompra->save();
        return Inertia::render('OrderCreated');

    }

    public function verificarOrden(Request $request) {
        if($request->has('id') ) {
            $order = Order::find($request->input('id'));

            $order->status = 'Confirmada';

            $order->save();
            return redirect()->back();
            
        }
    }
    
}
