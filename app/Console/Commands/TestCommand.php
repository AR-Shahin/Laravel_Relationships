<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\User;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        // info('hi');
        // City::where('people', '>',  300)->delete();
        // $this->info('Delete!');
        // $name =  $this->ask('What is your name?');
        // $password = $this->secret('What is the password?');
        // if ($this->confirm('Do you wish to continue?')) {
        //     $name =  $this->ask('What is your name?');
        // }
        // $name = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);
        $defaultIndex = 1;
        // $this->error('Something went wrong!');
        // $this->newLine();
        // $this->line('Display this on the screen');
        // $name = $this->choice(
        //     'What is your name?',
        //     ['Taylor', 'Dayle', 'shahin'],
        //     $defaultIndex
        // );
        // $this->info($name);
        // $this->table(
        //     ['Name', 'Role'],
        //     User::all(['name', 'role'])->toArray()
        // );
        // $users = $this->withProgressBar(User::all(), function ($user) {
        //     // $this->performTask($user);
        // });


        return 0;
    }
}
