<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Customer;
use App\Models\History;

class CustomerController extends Controller
{
    public function add () {
        // dd("redd");
        return view('customer.add');
    }

    public function save(Request $request) {
         //dd($request->postal_address);
         

         $this->validate($request,[
            "person_number" =>
                [ 
                    "required",                                    
                    "regex:/^(19|20)?[0-9]{6}[- ]?[0-9]{4}$/i",
                    "unique:customers,person_number"
                ],
            "phone_number" => "required|size:10|regex:/^07([0-9][ -]*){7}[0-9]$/i"

                        
        ]);


        $customer = new Customer();

        $customer->person_number = $request->person_number;
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->postal_address = $request->postal_address;
        $customer->phone_number = $request->phone_number;
        
        $customer->save();

        return redirect('customers')
        ->with('message','The new customer has beeb added successfully');

    }

    public function index() {
        $customer = Customer::all();
        return view('customer.index', ['customers' => $customer]);
    }
    public function remove($person_number){
        //dd($person_number);
        $customer = Customer::find($person_number);
        if($customer->check_out_by == null){
            $histories = History::where('person_number', $person_number)->get();
            foreach($histories as $history)
                $history->delete();

            $customer->delete();
        }
        

        

        return redirect('customers')
        ->with('message','The information of the customer has beeb removed successfully');

    }

        

    public function edit($person_number){
        
        $customer = Customer::find($person_number);

        //dd($customer);

        return view('customer.edit', ['customers' => $customer]);

    }

    public function update($person_number, Request $request){

        $this->validate($request,[
            /* "person_number" =>
                [ 
                    "required",
                    "regex:/^(19|20)?[0-9]{6}[- ]?[0-9]{4}$/i"
                ], */
            "phone_number" => "required|size:10|regex:/^07([0-9][ -]*){7}[0-9]$/i",
            
                        
        ]);
                
        $customer = Customer::find($person_number);

        //$customer->person_number = $request ->person_number;
        $customer->name = $request ->name;
        $customer->address = $request ->address;
        $customer->postal_address = $request ->postal_address;
        $customer->phone_number = $request ->phone_number;
        
        $customer->save();

        return redirect('customers')
        ->with('message','The customers information has beeb edited successfully');

    }
}


