<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class RegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email of registered users';

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
     * @return mixed
     */
    public function handle()
    {
        $totalUsers = \DB::table('users')
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->count();
            $emailtouser = \DB::table('registers')->select('*')->leftjoin('credits','registers.id','credits.user_id')->where('credits.credit_value','>',0)->get();
     
   
             foreach($emailtouser as $emailtouser_value)
             {
                
                 if($emailtouser_value->email!='')
                 {
                   Mail::send( 'emails.blessings',['name'=>$emailtouser_value->name], function ($m) use ($emailtouser_value) {
                   $m->from('info@opiant.online', 'GNS');
                   $m->to($emailtouser_value->email, $emailtouser_value->name)->subject('GNS |  Blessings'); });
                 }  
             }    
        
        
     // exit(); 
        
        
        
        
    // Mail::to('satyanarain_chauhan@opiant.in')->send(new SendMailable($totalUsers));
             
    }
}