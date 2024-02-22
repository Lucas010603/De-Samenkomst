<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct()
    {
        $this->customerService = new CustomerService();
    }

    public function Index()
    {
        $customers = $this->customerService->getAllCustomers();
        return view('customer.Index', ['customers' => $customers]);
    }

    public function Create()
    {
        $customers = $this->customerService->getAllCustomers();
        return view('/customer/Create', ['customers' => $customers]);
    }

    public function Store(Request $request)
    {
        $data = $request->validate([
            'company' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        $newProduct = $this->customerService->createCustomer($data);
        return redirect()->route('customer.index');
    }

    public function Edit(Customer $customer)
    {
        return view('custom.edit',['customer' => $customer]);
    }

    public function Delete()
    {
        $customers = $this->customerService->getAllCustomers();
        return view('/customer/Delete', ['customers' => $customers]);
    }
}
