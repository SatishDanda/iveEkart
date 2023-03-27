<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductTimeSlots;
use App\Models\OrderDaySlot;
use App\Models\Deliverydays;
use Botble\Ecommerce\Models\Product; 
use Botble\Ecommerce\Models\ProductVariation; 
use Cart;
use Illuminate\Support\Facades\Log;


class SharedController extends Controller
{
    /*
        Store & Update Product Slotes
        @Param $request
        @Param $product
        @Param $method_type either store 0 or update 1

    */

    public function storeProductTimeSlots(Request $request , Product $product , $method_type   )
    { 
        try {
            $product_slots = $request->input('delivery_day' , []); 
            if(count((array)$product_slots) > 0){  
                $products_list = ProductVariation::where('configurable_product_id', $product->id)->pluck('product_id');  
                    $products_ids = $products_list->toArray();
                    if(count($products_ids) > 0){
                        array_push($products_ids,$product->id);
                    } else{
                        $products_ids = array($product->id);
                    }  
                if($method_type === 1){ 
                    ProductTimeSlots::whereIn('product_id',$products_ids)->delete();
                }
                
                foreach($products_ids as $pr_key => $id){
                    foreach ($product_slots as $key => $product_slot) { 
                        $product_slots_values[] = [
                            'delivery_day' =>  $product_slot,
                            'start_time' => isset($request->starttime[$product_slot]) ? $request->starttime[$product_slot] : '09:00',
                            'end_time' => $request->endtime[$product_slot] ? $request->endtime[$product_slot] : '18:00',                        
                            'time_delivery_quota' => $request->slots[$product_slot] ?  $request->slots[$product_slot] : 0,
                            'product_id' => $id
                        ];
                    }
                }
               
                ProductTimeSlots::insert($product_slots_values); 
            }
        }
         catch (Exception $e) {
            return true;
        } 

    }
   
    public function storeOrderTimeSlots( Request $request ){ 
        // To Store Order Product Slot.
        $timeSlotMethods = $request->input('timeslot_method' , []);
        $orderId = $request->input('order_id');
        if(count($orderId) > 0){
              if(count($timeSlotMethods) > 0 ){ 
                    foreach($timeSlotMethods as $key => $value){
                        $OrderSlots[] = [ 
                            'order_id' => $orderId[0],
                            'product_time_slot_id' => $value,
                            'product_id' => $key,
                            'delivery_day_id' => 1
                        ];
                    } 
                    OrderDaySlot::insert($OrderSlots); 
                }

        }
      
    }


    public function removeCartAttributeProduct($productID)
    { 
        try {
           $configureProductId =  ProductVariation::where('product_id', $productID)->first(); 
           if(isset($configureProductId)){ 
           $product_ids =  ProductVariation::where('configurable_product_id', $configureProductId->configurable_product_id)->where('product_id','!=', $productID) ->pluck('product_id')->toArray(); 

            foreach(Cart::instance('cart')->content() as $itemsRemove){
                if(in_array($itemsRemove->id, $product_ids)){ 
                    Cart::instance('cart')->remove($itemsRemove->rowId);
                }
            } 
           } 
        } catch (Exception $e) {
            return true;
        } 
    }
}
