<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware("can:Customers List")->only('index');
    // }

    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // // public function create()
    // // {

    // //     return view('customers.create');
    // // }

    // // public function store(CustomerRequest $request)
    // // {
    // //     $validated = $request->validated();


    // //     if ($request->file('image')) {
    // //         $image_address = $request->file('image')->store('public/customer');
    // //         $validated['image'] = $image_address;
    // //     }

    // //     Customer::create($validated);

    // //     return redirect(route('customer.index'))->with('success', 'Customer successfuly created');
    // // }

    // // public function edit(Customer $customer)
    // // {
    // //     return view('customers.edit', compact('customer'));
    // // }

    // // public function update(Customer $customer, CustomerRequest $request)
    // // {
    // //     $validated = $request->validated();

    // //     if ($request->file('image')) {
    // //         $image_address = $request->file('image')->store('public/customer');
    // //         $validated['image'] = $image_address;
    // //     }

    // //     $customer->update($validated);

    // //     return redirect(route('customer.index'))->with('success', 'Customer successfuly updated');
    // // }

    // public function destroy(Customer $customer)
    // {
    //     try {
    //         $customer->destroy($customer->id);
    //     } catch (Exception $exception) {
    //         return redirect(route('customer.index'))->with('failure', 'Customer Cannot be deleted');
    //     }

    //     return redirect(route('customer.index'))->with('success', 'Customer successfuly deleted');
    // }
}
