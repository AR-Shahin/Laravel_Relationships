<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use App\Mail\SendUnVerifiedEmail;
use Illuminate\Support\Facades\Mail;

class SendNotVerifiedEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to unverified users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::whereIsVerified(0)->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendUnVerifiedEmail($user));
            $this->info("Email has been sent on {$user->name}!");
        }
    }
}
