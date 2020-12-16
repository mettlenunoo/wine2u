<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
// namespace App;

class Cart{

  public $items = null;
  public $totalQty = 0;
  public $totalPrice = 0;


   // ADD CART CODE
//    public function add($item,$id){

//     // $pid = $_POST['itemID'];
//     // $pdt_name = $_POST['pdt_name'];
//     $wasFound = false;
//     $i=0;

//     // if the cart session variable is not set or cart array is empty
//     if(!isset(Session["cart_array"]) || count($_SESSION["cart_array"]) < 1){

//     // RUN IF THE CART IS EMPTY OR NOT SET
//     $_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "item_name" => $pdt_name, "quantity" => 1));		  
      
//     }else{

//       // RUN IF THE CART AT LEAST ONE ITEM IN IT
//     foreach($_SESSION["cart_array"] as $each_item){
//      $i++;
//     while(list($key, $value) = each($each_item)){
//     if($key =="item_id" && $value == $pid){
//     // the item is in cart already so let's adjust it quantity using array_splice()
//     array_splice($_SESSION["cart_array"], $i-1,1,array(array("item_id" => $pid, "item_name" => $pdt_name, "quantity" => $each_item['quantity'] + 1)));
//      $wasFound = true;
 
//     }

//     }

//     }

//     if($wasFound == false){
//     array_push($_SESSION["cart_array"],array("item_id" => $pid, "item_name" => $pdt_name, "quantity" => 1));
       
//     }

// }

// echo count($_SESSION['cart_array'])." <br/> "."";
// exit();



// }
#############  END OF ADD TO CART ##################



//   public function __construct($oldCart)
//   {
//     if($oldCart){
//        $this->items = $oldCart->items;
//        $this->totalQty = $oldCart->totalQty;
//        $this->totalPrice = $oldCart->totalPrice;
//      }
//   }

//  public function add($item,$id){

//     $storedItem = ['qty' => 0, 'price' => $item->regular, 'item' => $item];
//         if($this->items){
//             if(array_key_exitsts($id, $this->items)){
//                 $storedItem = $this->items[$id];
//             }
//         }

//         $storedItem['qty']++;
//         $storedItem['price'] = $item->price * $storedItem['qty'];

//         $this->items[$id] = $storedItem;
//         $this->totalQty++;
//         $this->totalPrice += $item->price;

//   }
}




?>