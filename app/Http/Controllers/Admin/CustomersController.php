<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCustomersRequest;
use App\Http\Requests\Admin\UpdateCustomersRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class CustomersController extends Controller
{
    /**
     * Display a listing of Customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('customer_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Customer::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'customer_';
                $routeKey = 'admin.customers';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }

        return view('admin.customers.index');
    }

    /**
     * Show the form for creating new Customer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('customer_create')) {
            return abort(401);
        }
        return view('admin.customers.create');
    }

    /**
     * Store a newly created Customer in storage.
     *
     * @param  \App\Http\Requests\StoreCustomersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomersRequest $request)
    {
        if (! Gate::allows('customer_create')) {
            return abort(401);
        }
        $customer = Customer::create($request->all());

        
        if($request->get('homer_redirect') == 'true'){
            return redirect()->back();
        }
        return redirect()->route('admin.customers.index');
    }


    /**
     * Show the form for editing Customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('customer_edit')) {
            return abort(401);
        }
        $customer = Customer::findOrFail($id);

        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update Customer in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomersRequest $request, $id)
    {
        if (! Gate::allows('customer_edit')) {
            return abort(401);
        }
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());



        return redirect()->route('admin.customers.index');
    }


    /**
     * Display Customer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('customer_view')) {
            return abort(401);
        }
        $reservations = \App\Reservation::where('customer_id', $id)->get();

        $customer = Customer::findOrFail($id);

        return view('admin.customers.show', compact('customer', 'reservations'));
    }


    /**
     * Remove Customer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('admin.customers.index');
    }

    /**
     * Delete all selected Customer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Customer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Customer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();

        return redirect()->route('admin.customers.index');
    }

    /**
     * Permanently delete Customer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->forceDelete();

        return redirect()->route('admin.customers.index');
    }
}
