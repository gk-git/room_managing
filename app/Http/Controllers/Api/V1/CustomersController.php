<?php

namespace App\Http\Controllers\Api\V1;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCustomersRequest;
use App\Http\Requests\Admin\UpdateCustomersRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class CustomersController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function show($id)
    {
        return Customer::findOrFail($id);
    }

    public function update(UpdateCustomersRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        

        return $customer;
    }

    public function store(StoreCustomersRequest $request)
    {
        $customer = Customer::create($request->all());
        

        return $customer;
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return '';
    }
}
