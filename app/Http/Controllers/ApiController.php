<?php


namespace App\Http\Controllers;

use App\Collector;
use App\customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;



class ApiController extends Controller
{

 public function get_all_customer(){
     header("Content-type:application/json");
     $collector = customer::all()->all();
     if ($collector > 0){

         return response(['status' => 'true',  'data' => $collector], 200);

     } else {
         return response(['status' => 'false', 'Code' => 'Database Failure'], 200);
     }


 }
  public function get_all_collector(){
     header("Content-type:application/json");
     $collector = Collector::all()->all();
     if ($collector > 0){

         return response(['status' => 'true',  'data' => $collector], 200);

     } else {
         return response(['status' => 'false', 'Code' => 'Database Failure'], 200);
     }


 }

    public function loginaccount(Request $request)
    {
        header("Content-type:application/json");
        $email = Input::post('email');
        if (!$email) {
            return response(['status' => 'false', 'code' => 'Missing Email'], 200);
        }
        $password = Input::post('password');
        if (!$password) {
            return response(['status' => 'false', 'code' => 'Missing Password'], 200);
        }
        if (User::where('email', $email)->where('password', $password)->count() > 0) {
            $user_data = User::where('email', $email)->get();
            return response(['status' => 'true', 'Code' => 'Login successfully', 'data' => $user_data], 200);

        } else {
            return response(['status' => 'false', 'Code' => 'Email or password not match'], 200);
        }
    }


    public function get_customer_by_collector_id(Request $request)
    {
        header("Content-type:application/json");

        $collector_id = Input::post('collector_id');
        if (!$collector_id) {

            return response(['status' => 'false', 'code' => 'Missing Collector Id'], 200);

        }

        $collector = customer::where('payment_collector_id', $collector_id)->get();
        if ($collector) {

            return response(['status' => 'true', 'data' => $collector], 200);

        } else {
            return response(['status' => 'false', 'Code' => 'Database Failure'], 200);
        }

    }
}