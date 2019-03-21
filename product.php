<? 
/**
* @author: Andrea Abrudsky
*/

require_once "database.php";

class Product {

   function saleprice($idPizza){
      $costPrice=0;
      $ingredients='';
      $db = new Database();
      $db->databaseConect();
      $sql="SELECT b.cost_price, b.name FROM pizza a, ingredients b, pizza_ingredients c where a.id_pizza=".$idPizza." and
        a.id_pizza=c.id_pizza
        and c.id_ingredient=b.id_ingredient";
      $row= $db->querySelect($sql);
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
   function ingredientsToAdd($idPizza){

      $db = new Database();
      $db->databaseConect();
      $ingredients='(';
      $sql="SELECT b.cost_price, b.name, b.id_ingredient, a.id_pizza  FROM pizza_ingredients a, ingredients b WHERE
                    a.id_ingredient=b.id_ingredient
                    and a.id_Pizza=".$idPizza;
      $row= $db->querySelect($sql);
      $row=(array) json_decode($row, true);
      foreach($row as $ingredient) {
         $ingredients.=$ingredient['id_ingredient'];
         if ($ingredient != end($row)) {
               $ingredients.= ", ";
            }else{
               $ingredients.= ")";
            }
      }
      $sql2="SELECT a.cost_price, a.name, a.id_ingredient FROM ingredients a WHERE
                    a.id_ingredient NOT IN ".$ingredients;
      $result= $db->querySelect($sql2);
      return $result;

   }
   function changeCostPizza($id_ingredient){
      $db = new Database();
      $db->databaseConect(); 
      $costPrice='';
      $id_ingredient=substr($id_ingredient, 0, -1);
      $sql="SELECT b.cost_price  FROM ingredients b WHERE
                    b.id_ingredient in (".$id_ingredient.")";
     
      $row= $db->querySelect($sql);
      $row=(array) json_decode($row, true);
      foreach($row as $ingredient) {
         $costPrice=$costPrice+floatval($ingredient['cost_price']);
      }
      $costPrice=($costPrice/2)+$costPrice;
      $arrayData = array("costPrice" => $costPrice); 
      return $arrayData;
   }


}

?>