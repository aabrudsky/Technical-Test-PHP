<? 
/**
* @author: Andrea Abrudsky
*/

require_once "database.php";

class Product {
   function saleprice($row){
      $costPrice=0;
      $ingredients='';
      //error_log($row);
      $row=(array) json_decode($row, true);
      foreach($row as $ingredient) {
         $costPrice=$costPrice+floatval($ingredient['cost_price']);
         $ingredients.=$ingredient['name'];
         if ($ingredient != end($row)) {
               $ingredients.= ", ";
            }else{
               $ingredients.= ".";
            }
      }

      $costPrice=($costPrice/2)+$costPrice;
      $arrayData = array("costPrice" => $costPrice,"ingredients" => $ingredients);
      return $arrayData;
   }


}

?>