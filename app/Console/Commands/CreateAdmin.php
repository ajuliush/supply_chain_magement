<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Hash;
class CreateAdmin extends Command
{
    protected $signature = 'admin:new';
    protected $description = 'Create new admin user';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $name=$this->ask("Enter your name");
        $email=$this->ask("Enter your email");
        $password=$this->ask("Enter your password");
        $user=array(
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password),
            );
        User::create($user);
        $this->info('Successfully created admin user');
    }
}
