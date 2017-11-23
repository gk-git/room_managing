<?php

namespace App\Observers;

use App\Customer;
use App\User;
use App\Notifications\QA_EmailNotification;
use Illuminate\Support\Facades\Notification;

class CustomerCrudActionObserver
{

    

    public function deleting(Customer $model)
    {
        $users = User::get()->all();
        $emails = [];
        foreach($users as $user){
            $emails[] = $user->email;
        }
        $data = [
            "action" => "Deleted",
            "crud_name" => "Customers"
        ];
        $users = \App\User::where("email", $emails)->get();
        // Notification::send($users, new QA_EmailNotification($data));
    }

}