<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct()
    {
        $this->customerService = new CustomerService();
    }

    public function index()
    {
        return view('customer.index');
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

    public function filter(Request $request)
    {
        $customers = Customer::where('active', 1);

        return DataTables::of($customers)
            ->addColumn('actions', function ($customer) {
                return '<a href="' . route('customer.edit', ['customer' => $customer]) . '" class="btn btn-success">Edit</a>
                    <form action="' . route('customer.delete', $customer->id) . '" method="POST" style="display: inline;">
                        ' . csrf_field() . '
                        ' . method_field('PUT') . '
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>';
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
}
