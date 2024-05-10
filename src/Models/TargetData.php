<?php

namespace Bison\Target\Models;


use Bison\Target\Models\PostCustomersTarget;
use Illuminate\Support\Facades\DB;

class TargetData
{
    private function findCustomer($id){
        $customer = DB::table(PostCustomersTarget::POST_CUSTOMER_TARGET_TABLE)->where('customer_id',$id)->first();
        if ($customer){
            $customerData=  PostCustomersTarget::find($customer->id);
        }
        else {
            $customerData = new PostCustomersTarget;
        }
        return $customerData;
    }
    public function UpdateCustomer($request){
        $customer=$this->findCustomer($request->customer_id);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->telephone = $request->telephone;
        $customer->postcode = $request->postcode;
        $customer->city = $request->city;
        $customer->country_id = $request->country_id;
        $customer->customer_id = $request->customer_id;
        $customer->save();
    }
    public function getLaravelData(){
        return DB::table(PostCustomersTarget::POST_CUSTOMER_TARGET_TABLE)->select()->get();
    }
}
