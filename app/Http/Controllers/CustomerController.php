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

    public function toggleStatus($id)
    {
        return response()->json($this->customerService->toggleStatus($id));
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
        $filter = $request->input('filter');
        $customers = Customer::query();
        if($filter == "active"){
            $customers->where('active', 1);
        }
        if($filter == "deleted"){
            $customers->where('active', 0);
        }

        return DataTables::of($customers)
            ->addColumn('actions', function ($customer) {
                $btnColor = $customer->active ? "btn-danger" : "btn-primary";
                $text = $customer->active ? "verwijderen" : "herstellen";
                return '<a href="' . route('customer.edit', ['id' => $customer->id]) . '" class="btn btn-success">Edit</a>
                    <a class="btn ' . $btnColor . '" onclick="toggleStatus(' . $customer->id . ')">' . $text . '</a>';
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
}
