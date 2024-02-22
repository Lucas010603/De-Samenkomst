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
}