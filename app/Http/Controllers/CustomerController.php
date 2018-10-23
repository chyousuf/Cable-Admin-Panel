<?php

namespace App\Http\Controllers;

use App\Collector;
use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    public function customer_form(){

        $collector =  collector::all();

        return view('customer', compact('collector'));
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
        $payment_collected  =  (explode("|",$payment_collected_by));
        $payment_collected_by = $payment_collected[1];
        $payment_collected_id = $payment_collected[0];

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
        $insert->payment_collector_id = $payment_collected[0];
        $insert->save();
        if($insert){

            return redirect()->route('Addcustomer')->withErrors('Customer Insert Successfully');


        }else{
            return redirect()->route('Addcustomer')->withErrors('Customer Insert Failed');

        }

    }

    public function Show_customer(){

        $customer = customer::all();
        if($customer){

            return view('customer_table',compact('customer'));

        }
    }

    public function customer_delete($id){

        $customer_delete = DB::table('customers')->where('id',$id)->delete();
        $customer = customer::all();
        if($customer_delete){


            return redirect()->route('Show_customer')->withErrors('Customer Delete Successfully');


        }else{
            return redirect()->route('Show_customer')->withErrors('Customer Delete Failed');

        }
    }

    public function customer_Edit($id){

        $customer_Edit = DB::table('customers')->where('id',$id)->get();
        $collector =  collector::all();
        if($customer_Edit){


            return view('customer_Edit',compact('customer_Edit','collector'));


        }
    }


    public function Edit_customer_db($id){

        $name = Input::post('name');
        $father_name = Input::post('father_name');
        $phone_number = Input::post('phone_number');
        $address = Input::post('address');
        $region = Input::post('region');
        $payment_status = Input::post('payment_status');
        $payment_collected_by = Input::post('payment_collected_by');
        $monthly_amount = Input::post('monthly_amount');
        $payment_collected  =  (explode("|",$payment_collected_by));
        $payment_collected_by = $payment_collected[1];
        $payment_collected_id = $payment_collected[0];


        $customer_Edit = DB::table('customers')->where('id',$id)->update(['name'=>$name,
            'father_name'=>$father_name,'address'=>$address,'phone_number'=>$phone_number,'region'=>$region
        ,'payment_status'=>$payment_status,'payment_collected_by'=>$payment_collected_by
       ,'monthly_amount'=> $monthly_amount,'payment_collector_id'=>$payment_collected_id ]);


        if($customer_Edit){


            return redirect()->route('Show_customer')->withErrors('Customer Edit Successfully');


        }else{
            return redirect()->route('Show_customer')->withErrors('Customer Edit Failed');

        }

    }



}
