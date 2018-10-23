<?php

namespace App\Http\Controllers;

use App\Collector;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class CollectorController extends Controller
{
    public function collector_form(){

        return view('collector');
    }

    public function insert_collector(Request $request){

        $name = Input::post('name');
        $father_name = Input::post('father_name');
        $phone_number = Input::post('phone_number');
        $address = Input::post('address');
        $region = Input::post('region');
        $total_payment_collected = Input::post('total_payment_collected');
        $total_payment_given_to_owner = Input::post('total_payment_given_to_owner');
        $amount_pending = $total_payment_collected - $total_payment_given_to_owner;
        $total_payment_collected = $amount_pending;

        $insert = new collector();
        $insert->name = $name;
        $insert->father_name = $father_name;
        $insert->phone_number = $phone_number;
        $insert->address = $address;
        $insert->total_payment_collected = $total_payment_collected;
        $insert->region = $region;
        $insert->total_payment_given_to_owner = $total_payment_given_to_owner;
        $insert->amount_pending = $amount_pending;
        $insert->save();
        if($insert){

            return view('collector')->withErrors('Collector Insert Successfully');


        }else{
            return view('collector')->withErrors('Collector Insert Failed');

        }

    }

    public function Show_collector(){

        $collector = collector::all();
        if($collector){

            return view('collector_table',compact('collector'));

        }
    }

    public function collector_delete($id){

        $collector_delete = DB::table('collectors')->where('id',$id)->delete();

        if($collector_delete){


            return redirect()->route('Show_collector')->withErrors('collector Delete Successfully');


        }else{
            return redirect()->route('Show_collector')->withErrors('collector Delete Failed');

        }
    }

    public function collector_Edit($id){

        $collector_Edit = DB::table('collectors')->where('id',$id)->get();
        if($collector_Edit){


            return view('collector_Edit',compact('collector_Edit'));


        }
    }


    public function Edit_collector_db($id){

        $name = Input::post('name');
        $father_name = Input::post('father_name');
        $phone_number = Input::post('phone_number');
        $address = Input::post('address');
        $region = Input::post('region');
        $total_payment_collected = Input::post('total_payment_collected');
        $total_payment_given_to_owner = Input::post('total_payment_given_to_owner');
        $amount_pending = $total_payment_collected - $total_payment_given_to_owner;
        $total_payment_collected = $amount_pending;


        $collector_Edit = DB::table('collectors')->where('id',$id)->update(['name'=>$name,
            'father_name'=>$father_name,'address'=>$address,'phone_number'=>$phone_number,'region'=>$region
            ,'total_payment_collected'=>$amount_pending,'total_payment_given_to_owner'=>$total_payment_given_to_owner
            ,'amount_pending'=>$amount_pending ]);


        if($collector_Edit){


            return redirect()->route('Show_collector')->withErrors('collector Edit Successfully');


        }else{
            return redirect()->route('Show_collector')->withErrors('collector Edit Failed');

        }

    }
}
