<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\History;
class CarController extends Controller
{
    public function add(){
        
        return view('car.add');
       
    }

    public function save(Request $request) {

        
        $this->validate($request,[
            'registration' => 
            [
                'required',
                'size:6',
                'regex:/^[A-Z a-z]{3}\d{3}$/',
                "unique:cars,registration"   

            ],
            'color' => 'required|exists:colors,id',
            'make' => 'required|exists:makes,id',
            'year' => 'required|numeric|min:1900|max:2020',
            'price' => 'required|integer|min:0'
                    

        ]);
        
        
        $car = new Car();

        $car->registration = $request->registration;
        $car->year = $request->year;
        $car->price = $request->price;
        $car->color_id = $request->color;
        $car->make_id = $request->make;          
       
        
        $car->save();


        return redirect('cars')
            ->with('message', 'The ' . \App\Models\Color::find($car->color_id)->title . ', ' . \App\Models\Make::find($car->make_id)->title .  'car by registration number: ' . $car->registration .' has been added successfully.');

    }

    public function index() {
        $data['car'] = Car::all();
        return view('car.index', $data);

        /* return view('car.index', ['car' => Car::all()]); */
    }
    public function remove($id){
        //dd($id);
        $car = Car::find($id);

        if ($car->check_out_by == null) {
            
            $histories = History::where('car_id', $id)->get();
            foreach($histories as $history)
                $history->delete();

            $car->delete();
        }
            
         return redirect('cars')
            ->with('message', 'The information of the car deleted successfully.');  

    }
    public function edit($id){
        
        $car = Car::find($id);
        
        return view('car.edit', ['car' => $car]);

    }

    public function update($id, Request $request){

        $this->validate($request,[
            
            'color' => 'required|exists:colors,id',
            'make' => 'required|exists:makes,id',
            'year' => 'required|numeric|min:1900|max:2020',
            'price' => 'required|integer|min:0'

        ]); 
                
        $car = Car::find($id);

        //$car->registration = $request->registration;
        $car->year = $request->year;
        $car->price = $request->price;
        $car->color_id= $request->color;       
        $car->make_id = $request->make;
        
        
        $car->save();

        return redirect('cars')
        ->with('message','The information of the car has been edited successfully');

    }
}


