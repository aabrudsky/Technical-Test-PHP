<?php
    /**
    * @author: Andrea Abrudsky
    */

    include "database.php";
    include "product.php";
    $db = new Database();
    $db->databaseConect();
    
    if (isset($_REQUEST['accion'])) {
      switch (base64_decode($_REQUEST['accion'])) {
            case 'showOneProducts':
                //conect db, to select a pizza 
                $idPizza=base64_decode($_REQUEST['id']);
                $sql="SELECT b.cost_price, b.name as ingredient, a.name as pizza, a.id_pizza, b.id_ingredient, a.img FROM pizza a, ingredients b, pizza_ingredients c where a.id_pizza=".$idPizza." and
                    a.id_pizza=c.id_pizza
                    and c.id_ingredient=b.id_ingredient";
                $result= $db->querySelect($sql);
                echo $result;
            break;
            case 'showAllProducts':
                //conect db, to show all pizza 
                $sql="SELECT * FROM pizza";
                $result= $db->querySelect($sql);
                echo $result;
            break;
            case 'priceProduct':
                //conect db, to calculate pizza price 
                $idPizza=base64_decode($_REQUEST['id']);
                $product = new product();
                $data=$product->saleprice($idPizza);  
                echo json_encode($data);
            break;
            case 'ingredientsToAdd':
                //conect db, to show all the ingredients that de client can add to pizza 
                $idPizza=base64_decode($_REQUEST['id']); 
                $product = new product();
                $result=$product->ingredientsToAdd($idPizza); 
                echo $result;
            break;
            case 'changeCost':
                //when the client add or quit an ingredient de price change. here calculate a new price. 
                $id_ingredient=base64_decode($_REQUEST['id']); 
                $product = new product();
                $result=$product->changeCostPizza($id_ingredient); 
                echo json_encode($result);
            break;
        }
    } else {
        
    }
?>