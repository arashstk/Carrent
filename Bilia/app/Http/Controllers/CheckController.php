<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Customer;
use App\Models\History;
use Carbon\Carbon;

class CheckController extends Controller
{
    public function get_checkout(){
        $data = []; 
        $data['customers']= Customer::all();
        $data['cars']= Car::where('check_out_by', null)->get();

        return view('check.checkout', $data);

    }

    public function post_checkout(Request $request){

                //Fill the history table
            $history = new History();
            $history->car_id = $request ->car;
            $history->person_number = $request->person_number;
            $history->check_out_time = date('Y-m-d H:i:s');

            $history->save();

             //Fill the cars table
            $car = Car::find($request->car);
            $car->check_out_by = $request->person_number; 
            $car->check_out_time = $history->check_out_time; 
            $car->save(); 
            
            return redirect('cars');
    }

    public function get_checkin(){
        
        $data['cars'] = Car::where('check_out_by', '!=', null)->get();

        return view('check.checkin', $data);
    }

    public function post_checkin(Request $request){
        //dd($request -> all());
        $car = Car::find($request->car);
        $history = History::where('car_id' , $request->car)
        ->where('check_in_time', null)
        ->first();

        /* dd($history); */
        $now = Carbon::now();
        $days = Carbon::createFromTimeString($history->check_out_time)->diffInDays($now) + 1;
        /*dd($days);*/

        $history->days = $days;
        $history->cost = $days * $car->price;
        $history->check_in_time = date('Y-m-d H:i:s');
        $history->save();

        $car->check_out_time = null;
        $car->check_out_by = null;
        $car->save();

        return redirect('history');

    }
}
