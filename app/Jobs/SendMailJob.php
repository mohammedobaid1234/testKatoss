<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\SendEmailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(){
        // DB::table('users')->orderBy('id')
        // ->chunk(100, function ($users) {
        //     foreach ($users as $user) {
        //         $user->notify(new SendEmailNotification);
        //     }
        // });
        
        $users = User::chunk(100, function ($users) {
            Notification::send($users, new SendEmailNotification);
            
        });
    }
}
