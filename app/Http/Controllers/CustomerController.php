<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CustomerController extends Controller
{
    public function customer_form(){

        return view('customer');
    }

    public function insert_customer(Request $request){

        $name = Input::post('name');
        $father_name = Input::post('father_name');
        $phone_number = Input::post('phone_number');
        $address = Input::post('address');
        $region = Input::post('region');
        $amount_paid = Input::post('amount_paid');
        $payment_status = Input::post('payment_status');
        $payment_collected_by = Input::post('payment_collected_by');
        $connection_date = Input::post('connection_date');
        $payment_connection_date = Input::post('payment_connection_date');
        $monthly_amount = Input::post('monthly_amount');

        $insert = new customer();
        $insert->name = $name;
        $insert->father_name = $father_name;
        $insert->phone_number = $phone_number;
        $insert->address = $address;
        $insert->connection_date = $connection_date;
        $insert->region = $region;
        $insert->payment_status = $payment_status;
        $insert->payment_collected_by = $payment_collected_by;
        $insert->payment_collection_date = $payment_connection_date;
        $insert->monthly_amount = $monthly_amount;
        $insert->amount_paid = $amount_paid;
        $insert->save();
        if($insert){

            return view('customer')->withErrors('Customer Insert Successfully');


        }else{
            return view('customer')->withErrors('Customer Insert Failed');

        }

    }

}
