<?php

namespace App\Http\Controllers\Admin;

use App\Reservation;
use App\Room;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReservationsRequest;
use App\Http\Requests\Admin\UpdateReservationsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ReservationsController extends Controller
{
    /**
     * Display a listing of Reservation.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('reservation_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Reservation::query();
            $query->with("customer");
            $query->with("room");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('reservation_delete')) {
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
                $gateKey  = 'reservation_';
                $routeKey = 'admin.reservations';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('customer.name', function ($row) {
                return $row->customer ? $row->customer->name : '';
            });
            $table->editColumn('room.name', function ($row) {
                return $row->room ? $row->room->name : '';
            });
            $table->editColumn('start', function ($row) {
                return $row->start ? $row->start : '';
            });
            $table->editColumn('end', function ($row) {
                return $row->end ? $row->end : '';
            });
            $table->editColumn('paid', function ($row) {
                return \Form::checkbox("paid", 1, $row->paid == 1, ["disabled"]);
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });

            $table->rawColumns(['actions','paid']);

            return $table->make(true);
        }

        return view('admin.reservations.index');
    }

    /**
     * Show the form for creating new Reservation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('reservation_create')) {
            return abort(401);
        }
        
        $customers = \App\Customer::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $rooms = \App\Room::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.reservations.create', compact('customers', 'rooms'));
    }

    /**
     * Store a newly created Reservation in storage.
     *
     * @param  \App\Http\Requests\StoreReservationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationsRequest $request)
    {
        if (! Gate::allows('reservation_create')) {
            return abort(401);
        }
        $reservation = Reservation::create($request->all());



        return redirect()->route('admin.reservations.index');
    }


    /**
     * Show the form for editing Reservation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('reservation_edit')) {
            return abort(401);
        }
        
        $customers = \App\Customer::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $rooms = \App\Room::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $reservation = Reservation::findOrFail($id);

        return view('admin.reservations.edit', compact('reservation', 'customers', 'rooms'));
    }

    /**
     * Update Reservation in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationsRequest $request, $id)
    {
        if (! Gate::allows('reservation_edit')) {
            return abort(401);
        }
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());



        return redirect()->route('admin.reservations.index');
    }


    /**
     * Display Reservation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('reservation_view')) {
            return abort(401);
        }
        $reservation = Reservation::findOrFail($id);

        return view('admin.reservations.show', compact('reservation'));
    }


    /**
     * Remove Reservation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('reservation_delete')) {
            return abort(401);
        }
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('admin.reservations.index');
    }

    /**
     * Delete all selected Reservation at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('reservation_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Reservation::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Reservation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('reservation_delete')) {
            return abort(401);
        }
        $reservation = Reservation::onlyTrashed()->findOrFail($id);
        $reservation->restore();

        return redirect()->route('admin.reservations.index');
    }

    /**
     * Permanently delete Reservation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('reservation_delete')) {
            return abort(401);
        }
        $reservation = Reservation::onlyTrashed()->findOrFail($id);
        $reservation->forceDelete();

        return redirect()->route('admin.reservations.index');
    }
   
    public function reservations_add($start, $end, $resource)
    {
        $rooms = Room::get()->all();
        $customers = Customer::get()->all();
        return view('new_event', compact('rooms','start','end','resource','customers'));
    }
    public function reservations_edit($id) {
        $event = Reservation::findOrFail($id);
         $rooms = Room::get()->all();
        $customers = Customer::get()->all();
        return view('edit_event', compact('id','event','rooms','customers'));
    }
}
