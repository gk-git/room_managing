<?php

namespace App\Observers;

use App\Reservation;
use App\User;
use App\Notifications\QA_EmailNotification;
use Illuminate\Support\Facades\Notification;

class ReservationCrudActionObserver
{

    public function created(Reservation $model)
    {
       $users = User::get()->all();
        $emails = [];
        foreach($users as $user){
            $emails[] = $user->email;
        }
        $data = [
            "action" => "خلقت",
            "crud_name" => "الحجوزات"
        ];

        $users = \App\User::where("email", $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));

    }

    public function updated(Reservation $model)
    {
      $users = User::get()->all();
        $emails = [];
        foreach($users as $user){
            $emails[] = $user->email;
        }
        $data = [
            "action" => "تم التحديث",
            "crud_name" => "الحجوزات"
        ];
        $users = \App\User::where("email", $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));
    }

    public function deleting(Reservation $model)
    {
       $users = User::get()->all();
        $emails = [];
        foreach($users as $user){
            $emails[] = $user->email;
        }
        $data = [
            "action" => "تم الحذف",
            "crud_name" => "الحجوزات"
        ];
        $users = \App\User::where("email", $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));
    }

}