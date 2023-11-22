<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Address;

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
}
