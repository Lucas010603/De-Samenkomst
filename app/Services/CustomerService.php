<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{

    public function getAll()
    {
        return Customer::where('active', 1)->get();
    }

    public function create($data)
    {
        return Customer::insert($data);
    }

    public function update($id, $data)
    {
        $customer = Customer::find($id);
        return $customer->update($data);
    }

    public function toggleStatus($id)
    {
        $customer = Customer::find($id);
        if ($customer->active) {
            return $customer->update(['active' => 0]);
        } else {
            return $customer->update(['active' => 1]);
        }
    }


}
