<?php

namespace Bison\Target\Helper;

use Illuminate\Support\Facades\DB;
use Bison\Target\Models\CustomerConfiguration;

class Data {
    public function getAcessToken() {
        return  DB::table("customer_configurations")->where('configname', "token")->first()->configvalue;
    }
    public function getDomainUrl() {
        return  DB::table("customer_configurations")->where('configname', "domainurl")->first()->configvalue;
    }
    public function getTargetView() {
        return  "target::get-customer-target-form-bison";
    }
    public function getLaravelView() {
        return  "target::get-customer-target-form-laravel";
    }
    public function getCustomerJson($request){
        return'{
  "customer": {
    "email": "'.$request->email.'",
    "firstname": "'.$request->firstname.'",
    "lastname": "'.$request->lastname.'",
    "addresses": [
      {

        "firstname": "'.$request->firstname.'",
        "lastname": "'.$request->lastname.'",

        "postcode": "'.$request->postcode.'",
        "street": [
          "123 Oak Ave"
        ],
        "city": "'.$request->city.'",
        "telephone": "'.$request->telephone.'",
        "countryId": "'.$request->country_id.'"
      }
    ]
  }
}
';
    }
    public function getRedirectUrl() {
        return  "get-customer-target-form-bison/";
    }
    public function getSucessStatus() {
        return  "Target Customer Data Has Been inserted";
    }
}
