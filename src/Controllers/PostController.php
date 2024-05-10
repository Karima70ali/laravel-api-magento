<?php

namespace Bison\Target\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Bison\Target\Helper\Data;
use Bison\Target\Models\TargetData;

class PostController

{
    const CUSTOMER_API_LABEL ="customers/";
    public function __construct(Data $data,TargetData $targetData)
    {
        $this->data = $data;
        $this->targetData=$targetData;
    }

    public function getCustomer($id){
        $response = Http::withToken($this->data->getAcessToken())->get($this->data->getDomainUrl().$this::CUSTOMER_API_LABEL.$id);
        $jsonData = $response->json();
        return view($this->data->getTargetView(), $jsonData);

    }
    private function UpdateMagentoCustomer($id,$request){
        $response = Http::withToken($this->data->getAcessToken())->put($this->data->getDomainUrl().$this::CUSTOMER_API_LABEL.$id, json_decode($this->data->getCustomerJson($request), true));
        $jsonData = $response->json();

    }
    public function storeCustomers(Request $request){
        $this->targetData->UpdateCustomer($request);
        $this->UpdateMagentoCustomer($request->customer_id,$request);
        return redirect($this->data->getRedirectUrl().$request->customer_id)->with('status', $this->data->getSucessStatus());
    }

    public function getLaravelData(){
        $customers=  $this->targetData->getLaravelData();
        return view($this->data->getLaravelView())->with('customers', $customers);
    }

}
