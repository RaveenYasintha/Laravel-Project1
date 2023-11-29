<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;

class AddressesController extends Controller
{
    public function index(){
        $address = Address::all();

        $data = [
            "status"=>200,
            "address"=> $address

        ];

        return response()->json($data,200);
    }

    // public function save(Request $request){

    //     $validator = Validator::make($request->all(),[
    //         'address'=>'required',

    //     ]);


    //     if($validator->fails()){

    //         $data=[

    //             "status"=>422,
    //             "message"=>$validator->messages()
    //         ];

    //         return response()->json($data, 422);
    //     }

    //     else{


    //         $address = new Address;

    //         $address->address=$request->address;

    //         $address->save();

    //         $data=[
    //             'status'=>200,
    //              'message'=>'Data uploaded succesfully'
    //         ];

    //         return response()->json($data, 200);

    //     }
    // }
}
