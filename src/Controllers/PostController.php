<?php

namespace Bison\Target\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\PostCustomersTarget;
class PostController

{

    public function show(){
        return "hell wold";
    }
    /**

     * Write code on Method

     *

     * @return response()

     */
private $token ="eyJraWQiOiIxIiwiYWxnIjoiSFMyNTYifQ.eyJ1aWQiOjEyMywidXR5cGlkIjoyLCJpYXQiOjE3MTUwOTYyMzUsImV4cCI6MTcxNTA5OTgzNX0.lHT1enrlcYq_SxfPuzydpwLSA5ZoFarMPTVL-U1hK8I";
    private $domainUrl="https://target-darts.brmcloud.co.uk/rest/V1/";
public function index($id)

    {
        $response = Http::withToken($this->token)->get('https://target-darts.brmcloud.co.uk/rest/V1/orders/'.$id);
        $jsonData = $response->json();

        dd($jsonData);

    }
    public function getOrderComment($id)

    {
       $response = Http::withToken($this->token)->get('https://target-darts.brmcloud.co.uk/rest/V1/orders/'.$id.'/comments');
        $jsonData = $response->json();

        dd($jsonData);

    }
    public function postOrderComment()
    {
        $arrayparm='{
  "statusHistory": {
    "comment": "hello2",
    "entity_id": 0,
    "entity_name": "hello2",
    "is_customer_notified": 0,
    "is_visible_on_front": 0,
    "parent_id": 0,
    "status": "hello2"
  }
}';
        $response = Http::withToken($this->token)->post('https://target-darts.brmcloud.co.uk/rest/V1/orders/69/comments', json_decode($arrayparm, true));
        $jsonData = $response->json();

        dd($jsonData);
    }


    public function getProduct($sku)

    {
        DB::table('magento_customers')->insert(array('name'=>'dude', 'body'=>'comment'));
       /* $response = Http::withToken($this->token)->get('https://target-darts.brmcloud.co.uk/rest/V1/products/'.$sku);
        $jsonData = $response->json();
        dd($jsonData);*/

    }

    public function postProduct()
    {
        $arrayparm='{
  "product": {
    "sku": "MS-Champ-S-test3",
    "name": "Champ Tee Small2",
    "attribute_set_id": 4,
    "price": 25,
    "status": 1,
    "visibility": 1,
    "type_id": "simple",
    "weight": "0.5"
  }
}';
        $response = Http::withToken($this->token)->post('https://target-darts.brmcloud.co.uk/rest/V1/products', json_decode($arrayparm, true));


        $jsonData = $response->json();

        dd($jsonData);
    }
    public function getCustomer($id){
        $response = Http::withToken($this->token)->get($this->domainUrl.'customers/'.$id);
        $jsonData = $response->json();
        return view('target::get-customer-target-form-bison', $jsonData);

    }
    private function UpdateCustomer($id,$request){
    $arrayparm2='{
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

        $response = Http::withToken($this->token)->put($this->domainUrl.'customers/'.$id, json_decode($arrayparm2, true));
        $jsonData = $response->json();

    }
    public function storeCustomers(Request $request){
        $customer = DB::table('post_customers_targets')->where('customer_id', $request->customer_id)->first();;
      //
        if ($customer){
            $customer=  PostCustomersTarget::find($customer->id);
        }
        else {
            $customer = new PostCustomersTarget;
        }
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->telephone = $request->telephone;
        $customer->postcode = $request->postcode;
        $customer->city = $request->city;
        $customer->country_id = $request->country_id;
        $customer->customer_id = $request->customer_id;
        $customer->save();
        $this->UpdateCustomer($request->customer_id,$request);
        return redirect('get-customer-target-form-bison/'.$request->customer_id)->with('status', 'Target Customer Data Has Been inserted');
    }

}
