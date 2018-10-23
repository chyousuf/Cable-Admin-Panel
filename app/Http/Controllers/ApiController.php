<?php


namespace App\Http\Controllers;

use App\Collector;
use App\customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;



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
        $name = Input::post('name');
        if (!$name) {
            return response(['status' => 'false', 'code' => 'Missing Email'], 200);
        }
        $password = Input::post('password');
        if (!$password) {
            return response(['status' => 'false', 'code' => 'Missing Password'], 200);
        }
        if (Collector::where('name', $name)->where('password', $password)->count() > 0) {
            $user_data = Collector::where('password', $password)->get();
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

    public function update_customer_by_collector_id(Request $request)
    {
        header("Content-type:application/json");

        $customer_id = Input::post('customer_id');
        if (!$customer_id) {

            return response(['status' => 'false', 'code' => 'Missing customer Id'], 200);

        }
        $amount_paid = Input::post('amount_paid');
        if (!$amount_paid) {

            return response(['status' => 'false', 'code' => 'Missing amount Paid'], 200);

        }


        $get_data = DB::table('customers')->where('id', $customer_id)->get();
        $montly_amount = $get_data[0]->monthly_amount;
        $reserve_amount = $get_data[0]->reserve_amount;
        $collector_id = $get_data[0]->payment_collector_id;

        //update collector
        $collector_perivous_amount = DB::table('collectors')->where('id', $collector_id)->get();
        if($collector_perivous_amount){

            $collector_perivous_amount = $collector_perivous_amount[0]->total_payment_collected;
            $total_payment_collected=   $collector_perivous_amount + $amount_paid;
            $collector_total_amount = DB::table('collectors')->where('id', $collector_id)->update(['total_payment_collected' => $total_payment_collected]);

        }
        //amount paid set

        $total_amount = $reserve_amount + $amount_paid;
        if($total_amount < $montly_amount  ){

            return response(['status' => 'false', 'code' => 'total amount is less then Amount Paid'], 200);
        }elseif($total_amount >= $montly_amount){

            $customer_status = DB::table('customers')->where('id', $customer_id)->get();
            if($customer_status){

                $customer_status =  $customer_status[0]->payment_status;

                if($customer_status == 'paid'){

                    $reserve_amount = $total_amount;
                    $reserve_amount = DB::table('customers')->where('id', $customer_id)->update(['reserve_amount' => $reserve_amount]);
                    $collector_amount = DB::table('collectors')->where('id', $collector_id)->get();
                    $collector_amount  =  $collector_amount[0]->total_payment_collected;

                    if ($reserve_amount > 0) {

                        $amount_paid = DB::table('customers')->where('id', $customer_id)->update(['amount_paid' => $amount_paid]);

                        return response(['status' => 'true','code'=>'Amount Update successfully', 'total_amount_collector' =>$collector_amount ], 200);

                    } else {
                        return response(['status' => 'false', 'Code' => 'Database Failure'], 200);
                    }

                }elseif($customer_status == 'unpaid'){

                    $newtotalAmount = $total_amount  - $montly_amount;
                    $reserve_amount = $newtotalAmount;
                    $reserve_amount = DB::table('customers')->where('id', $customer_id)->update(['reserve_amount' => $reserve_amount]);
                    $paid =  DB::table('customers')->where('id', $customer_id)->update(['payment_status' => 'paid']);

                    if ($reserve_amount > 0) {
                        $amount_paid = DB::table('customers')->where('id', $customer_id)->update(['amount_paid' => $amount_paid]);

                        $collector_amount = DB::table('collectors')->where('id', $collector_id)->get();
                        $collector_amount  =  $collector_amount[0]->total_payment_collected;

                        return response(['status' => 'true','code'=>'Amount Update successfully', 'total_amount_collector' =>$collector_amount ], 200);

                    } else {
                        return response(['status' => 'false', 'Code' => 'Database Failure'], 200);
                    }

                }

            }


        }


    }


    public function get_all_customer_by_collector_id(Request $request)
    {
        header("Content-type:application/json");

        $collector_id = Input::post('collector_id');
        if (!$collector_id) {

            return response(['status' => 'false', 'code' => 'Missing collector Id'], 200);

        }

        $collector = DB::table('customers')->where('payment_collector_id', $collector_id)->get();
        if ($collector) {

            return response(['status' => 'true', 'data' => $collector], 200);

        } else {
            return response(['status' => 'false', 'Code' => 'Database Failure'], 200);
        }

    }



}