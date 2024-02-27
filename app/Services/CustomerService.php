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

    public function delete($id)
    {
        $customer = Customer::find($id);
        if ($customer && $customer->active == 1) {
            $customer->update(['active' => 0]);
            return true;
        } else {
            return false;
        }
    }


}
