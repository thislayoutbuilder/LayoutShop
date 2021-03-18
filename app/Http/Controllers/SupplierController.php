<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Inertia\Inertia;

class SupplierController extends Controller
{
    //

    public function index() {
        return Inertia::render('Supplier');
    }

    public function returb() {
        return redirect()->back();
    }

    public function store(Request $request)
    {

        $newSupplier = New Supplier();
        $newSupplier->name = $request->name;
        $newSupplier->city = $request->city;
        $newSupplier->state = $request->state;
        $newSupplier->phone_number = $request->phone_number;
        $newSupplier->status = $request->status;
        $newSupplier->save();
        return Inertia::render('SupplierCreated');
    }

    public function list() {
        $allSupplier = Supplier::all('id','name','city','state', 'phone_number', 'created_at', 'updated_at');
        return Inertia::render('SupplierList', ['allSupplier' => $allSupplier]);
    }


    public function update(Request $request) {
        if($request->has('id') ) {
            Supplier::find($request->input('id'))->update($request->all());
            return redirect()->back();
        }
    }

    public function edit(Request $request) {
        $supplierToGet = Supplier::find($request->input('id'));
        return Inertia::render('EditSupplier', ['supplierToGet' => $supplierToGet]);
    }

    public function destroy(Request $request) {
        if($request->has('id') ) {
            Supplier::find($request->input('id'))->delete();
            return redirect()->back();
            
        }
    }
}
