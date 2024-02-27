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
        $customers = $this->customerService->getAll();
        return view('customer.index', ['customers' => $customers]);
    }

    public function new()
    {
        $customers = $this->customerService->getAll();
        return view('customer.new', ['customers' => $customers]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['company' => 'nullable', 'email' => 'required|email', 'phone' => 'required|numeric']
        );
        $this->customerService->create($data);
        return redirect()->route('customer');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', ['customer' => $customer]);
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'company' => 'nullable',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);

        $this->customerService->update($id, $data);

        return redirect()->route('customer');
    }

    public function delete($id)
    {
        return response()->json($this->customerService->delete($id));
    }

    public function status($status)
    {
        if ($status === 'active') {
            $customers = Customer::where('active', 1)->get();

        } elseif ($status === 'deleted') {
            $customers = Customer::where('active', 0)->get();

        } else {
            $customers = Customer::all();

        }

        return response()->json($customers);
    }

}
