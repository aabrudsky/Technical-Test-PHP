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
                $idPizza=base64_decode($_REQUEST['id']);
                $sql="SELECT b.cost_price, b.name as ingredient, a.name as pizza, a.id_pizza, b.id_ingredient, a.img FROM pizza a, ingredients b, pizza_ingredients c where a.id_pizza=".$idPizza." and
                    a.id_pizza=c.id_pizza
                    and c.id_ingredient=b.id_ingredient";
                $result= $db->querySelect($sql);
                echo $result;
            break;
            case 'showAllProducts':
                $sql="SELECT * FROM pizza";
                $result= $db->querySelect($sql);
                echo $result;
            break;
            case 'priceProduct':
                $idPizza=base64_decode($_REQUEST['id']);
                $product = new product();
                $data=$product->saleprice($idPizza);  
                echo json_encode($data);
            break;
            case 'ingredientsToAdd':
                $idPizza=base64_decode($_REQUEST['id']); 
                $product = new product();
                $result=$product->ingredientsToAdd($idPizza); 
                echo $result;
            break;
            case 'changeCost':
                $id_ingredient=base64_decode($_REQUEST['id']); 
                $product = new product();
                $result=$product->changeCostPizza($id_ingredient); 
                echo json_encode($result);
            break;
        }
    } else {
        
    }
?>