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

    public function index()
    {
        $customers = $this->customerService->getAllCustomers();
        return view('customer.index', ['customers' => $customers]);
    }

    public function new()
    {
        $customers = $this->customerService->getAllCustomers();
        return view('customer.new', ['customers' => $customers]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['company' => 'required', 'email' => 'required|email', 'phone' => 'required|numeric']);
        $this->customerService->createCustomer($data);
        return redirect()->route('customer');
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit',['customer' => $customer]);
    }

    public function delete()
    {
        $customers = $this->customerService->getAllCustomers();
        return view('/customer/delete', ['customers' => $customers]);
    }
}
