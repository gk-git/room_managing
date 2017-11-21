<?php

namespace App\Http\Controllers\Api\V1;

use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReservationsRequest;
use App\Http\Requests\Admin\UpdateReservationsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Event
{
}

class Custom_Result
{
}


class ReservationsController extends Controller
{
    public function index()
    {
        return Reservation::all();
    }

    public function show($id)
    {
        return Reservation::findOrFail($id);
    }

    public function update(UpdateReservationsRequest $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());


        return $reservation;
    }

    public function store(StoreReservationsRequest $request)
    {
        $reservation = Reservation::create($request->all());


        return $reservation;
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return '';
    }

    public function newReservation(StoreReservationsRequest $request)
    {
        $reservation = Reservation::create($request->all());

        $response = [
            'result' => 'ok',
            'message' => 'Created with id: ' . $reservation->id,
            'id' => $reservation->id,
            'reservation' => $reservation
        ];
        return response()->json($response);
    }

    public function deleteReservation(Request $request)
    {
        $reservation = Reservation::findOrFail($request->get('id'));
        $reservation->delete();
        $response = [
            'result' => 'ok',
            'message' => 'Delete successful',
        ];
        return response()->json($response);
    }

    public function getReservations(Request $request)
    {
//        $stmt = $db->prepare("SELECT * FROM reservations WHERE ((end > :start) AND (start < :end))");
        $newReservationArray = [];
        $reservations = Reservation::where('end', '>', $request->get('start'))->where('start', '<', $request->get('end'))->get()->all();
        for ($index = 0; $index < count($reservations); $index++) {
            $e = new Event();
            $e->id = $reservations[$index]['id'];
            $e->text = $reservations[$index]['name'];
            $e->start = $reservations[$index]['start'];
            $e->end = $reservations[$index]['end'];
            $e->resource = $reservations[$index]['room_id'];
            $e->bubbleHtml = "Reservation details: <br/>" . $reservations[$index]['text'];

            // additional properties
            $e->status = $reservations[$index]['status'];
            $e->paid = $reservations[$index]['paid'];
            $newReservationArray[] = $e;

        }
        return response()->json($newReservationArray);


    }

    public function moveReservation(Request $request)
    {
        $reservations = Reservation::where('end', '>', $request->get('start'))
            ->where('start', '<', $request->get('end'))
            ->where('id', '!=', $request->get('id'))
            ->where('room_id', '=', $request->get('resource'))
            ->get()->all();
        $overlaps = count($reservations) > 0;

        if ($overlaps) {
            $response = new Custom_Result();
            $response->result = 'Error';
            $response->message = 'This reservation overlaps with an existing reservation.';
            return response()->json($response);

        }
        $newReservation = Reservation::findOrFail($request->get('id'));
        $newReservation->update([
            'start' => $request->get('newStart'),
            'end' => $request->get('newEnd'),
            'resource' => $request->get('newResource')
        ]);

        $response = new Custom_Result();
        $response->result = 'OK';
        $response->message = 'Update successful';
        return response()->json($response);


    }

    public function resizeReservation(Request $request)
    {
        $newReservation = Reservation::findOrFail($request->get('id'));
        $newReservation->update([
            'start' => $request->get('newStart'),
            'end' => $request->get('newEnd')
        ]);


        $response = new Custom_Result();
        $response->result = 'OK';
        $response->message = 'Update successful';
        return response()->json($response);

    }

    public function updateReservations(Request $request)
    {
        $reservation = Reservation::findOrFail($request->get('id'));
        $reservation->update($request->all());

        $response = new Custom_Result();
        $response->result = 'OK';
        $response->message = 'Update successful';
        return response()->json($response);
        return response()->json($response);

    }
}
