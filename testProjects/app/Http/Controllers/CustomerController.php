<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function getAll()
            {
        $customer = Customer::all();
        $data = [
            'status'=>200,
            'customer'=>$customer
        ];
        return response()->json($data,200);
    }

    public function getAddressByID($id)
    {
        $customer = Customer::find($id);
        $data = [
            'status'=>200,
            'customer'=>$customer->addresses
        ];
        return response()->json($data,200);
    }



    public function save(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'contact'=>'required',
            'salary'=>'required',
        ]);

        if($validator->fails()){

            $data=[

                "status"=>422,
                "message"=>$validator->messages()
            ];

            return response()->json($data, 422);
        }
        else{

            if($request->hasFile('image')){
                $img = $request->image;
                $imageName = time().'.'. $img->getClientOriginalExtension();
                $img->move(public_path('images'),$imageName);

                $imagePath = 'images/' . $imageName;

            }else{
                $imagePath = null;
            }


            $customer = new Customer;

            $customer->name=$request->name;
            $customer->contact=$request->contact;
            $customer->salary=$request->salary;

            $customer->save();

            $data=[
                'status'=>200,
                 'message'=>'Data uploaded succesfully'
            ];

            return response()->json($data, 200);

        }
    }


    public function edit(Request $request,$id){

        $validator = Validator::make($request->all(),[

            'name'=>'required',
            'contact'=>'required',
            'salary'=>'required',
        ]);

        if($validator->fails()){

            $data=[

                "status"=>422,
                "message"=>$validator->messages()
            ];

            return response()->json($data, 422);
        }
        else{
            $customer = Customer::find($id);

            $customer->name=$request->name;
            $customer->contact=$request->contact;
            $customer->salary=$request->salary;

            $customer->save();

            $data=[
                'status'=>200,
                 'message'=>'Data update succesfully'
            ];

            return response()->json($data, 200);

        }

    }

    public function delete($id){
        $customer=Customer::find($id);

        $customer->delete();

        $data=[
            'status'=>200,
            'message'=>"data deleted succesfully"
        ];

        return response()->json($data,200);

    }
}
