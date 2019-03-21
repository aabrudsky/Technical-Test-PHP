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
                $sql="SELECT b.cost_price, b.name FROM pizza a, ingredients b, pizza_ingredients c where a.id_pizza=".$idPizza." and
                    a.id_pizza=c.id_pizza
                    and c.id_ingredient=b.id_ingredient";
                $result= $db->querySelect($sql);
                $product = new product();
                $data=$product->saleprice($result);  
                echo json_encode($data);
            break;
            case 'ingredientsToAdd':
                $idPizza=base64_decode($_REQUEST['id']); 
                $sql="SELECT b.cost_price, b.name, b.id_ingredient, a.id_pizza,".$idPizza." as seleccionada  FROM pizza_ingredients a, ingredients b WHERE
                    a.id_ingredient=b.id_ingredient";
                error_log($sql);
                $result= $db->querySelect($sql);
                echo $result;
            break;
            case 'changeStatus':
                $idProduct=base64_decode($_REQUEST['id']);
                $sql="UPDATE products SET status = '-1' WHERE id = ".$idProduct;
                $status= $db->queryUpdate($sql);
               // error_log("RESULT  changeStatus  ::: ".$status);
                echo $status;
            break;
        }
    } else {
        
    }
?>