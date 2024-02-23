<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function getAllCustomers()
    {
        // Retrieve all customers from the database
        return Customer::all();
    }

    public function createCustomer($data)
    {
        return Customer::insert($data);
    }

    public function updateCustomer($id, $data)
    {
        $customer = Customer::find($id);
        $customer->update($data);
        return $customer;
    }

    public function deleteCustomer($id)
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