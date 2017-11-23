<?php

namespace App\Http\Controllers\Api\V1;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoomsRequest;
use App\Http\Requests\Admin\UpdateRoomsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Room_Result
{
}


class RoomsController extends Controller
{
    public function index()
    {
        return Room::all();
    }

    public function show($id)
    {
        return Room::findOrFail($id);
    }

    public function update(UpdateRoomsRequest $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->update($request->all());


        return $room;
    }

    public function store(StoreRoomsRequest $request)
    {
        $room = Room::create($request->all());


        return $room;
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return '';
    }

    public function newRoom(StoreRoomsRequest $request)
    {

        $room = Room::create($request->all());

        $response = new Room_Result();
        $response->result = 'OK';
        $response->message = 'Created with id: ' . $room->id;
        $response->id = $room->id;
        $response->request = $request;
        return response()->json($response);

    }

    public function room_update(Request $request)
    {
        $room = Room::findOrFail($request->get('id'));
        $room->update($request->all());

        $response = new Room_Result();
        $response->result = 'OK';
        $response->message = 'Update successful';
        return response()->json($response);
    }

    public function getRooms(Request $request)
    {

        $room_number = $request->get('room_number');
       
            $rooms = Room::where('name', 'like','%'.$room_number . '%' )->orderBy('id')->get()->all();;
            $results = [];
            foreach ($rooms as $room) {

                $r = new Room_Result();
                $r->id = $room['id'];
                $r->name = $room['name'];
                $r->capacity = $room['capacity'];
                $r->status = $room['status'];
                $r->size = $room['size'];
                $results[] = $r;
            }
            return response()->json($results);
     


    }
}
