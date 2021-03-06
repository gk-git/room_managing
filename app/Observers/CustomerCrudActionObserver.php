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
         $data = [
            "action" => "تم الحذف",
            "crud_name" => "الزبائن"
        ];
        foreach($users as $user){
            $emails[] = $user->email;
            Notification::send($user, new QA_EmailNotification($data));
        }
       
        $users = \App\User::where("email", $emails)->get();
        // Notification::send($users, new QA_EmailNotification($data));
    }

}