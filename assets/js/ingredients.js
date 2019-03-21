
$(document).ready(function() {
    $('#exampleModal').on('shown.bs.modal', function () {
        ids = "";
        li="";
        $("#included li").each ( function (){
            ids += $(this).attr("id") + ",";
        })
        ids.slice(0, -1);
        $( "#namePizza" ).clone().appendTo( "#modal-body" );
        $( "#included" ).clone().appendTo( "#modal-body" );
        $( ".titlePrice #price" ).clone().appendTo( "#modal-body" );
        $('.secondSave').click(function (e) {
            alert("Missing Define - Here is sent to cook your order");
        });
    })
});
(function($) {  
    $.get = function(key)   {  
        key = key.replace(/[\[]/, '\\[');  
        key = key.replace(/[\]]/, '\\]');  
        var pattern = "[\\?&]" + key + "=([^&#]*)";  
        var regex = new RegExp(pattern);  
        var url = unescape(window.location.href);  
        var results = regex.exec(url);  
        if (results === null) {  
            return null;  
        } else {  
            return results[1];  
        }  
    }  
})(jQuery);  

function ingredientsPizza(){
    id= $.get("id");
    addIngredientsList(id);
    $.ajax({ 
        type: 'POST', 
        url: 'controller.php?accion='+btoa('showOneProducts'), 
        data: { id: id }, 
        dataType: 'json',
        success: function (data) { 
            addPizza(data);
        },
        error:function(){
            
        }
    });
};
function addIngredientsList(id){
    $.ajax({ 
        type: 'POST', 
        url: 'controller.php?accion='+btoa('ingredientsToAdd'), 
        data: { id: id }, 
        dataType: 'json',
        success: function (data) { 
            addIngredientsFirst(data);
        },
        error:function(){
            
        }
    });
};
function addPizza(data){

    ingredients='';
    namePizza=data[0].pizza;
    imgPizza='<img src="assets/img/'+data[0].img+'" class="img img-responsive" />';
    //console.log(data);
    data.forEach(function(element) {

        ingredients+='<li class="list-group-item col-sm-5" id="'+element.id_ingredient+'"><p class="itemIng">'+element.ingredient+'</p><a href="javascript:deleteIngredient(\''+btoa(element.id_ingredient)+'\',\''+btoa(element.ingredient)+'\')"><i class="fas fa-times-circle"></i></a></li>';
        //namePizza=element.pizza;
    });
    $.ajax({ 
        type: 'POST', 
        url: 'controller.php?accion='+btoa('priceProduct'), 
        data: { id: btoa(data[0].id_pizza) }, 
        dataType: 'json',
        success: function (dataCost) { 
            formatData="Total: <b>€ "+dataCost.costPrice+"</b>";
            $('#price').html(formatData);
        },
        error:function(){
        }
    });
    $('#included').html(ingredients);
    $('#namePizza').html(namePizza);
    $('#selectedImg').html(imgPizza);

}
function addIngredientsFirst(data){

    ingredients='';
    data.forEach(function(element) {;
            ingredients+='<option value="'+element.id_ingredient+'" id="'+element.id_ingredient+'">'+element.name+'</option>';
    });
   $('#newIngredient').append(ingredients);
}
function  addIngredient(sel){
    name=$('#newIngredient option:selected').text();
    id=sel.value;
    idName='#'+id;
    $(idName).remove();
    newIngredient='<li class="list-group-item col-sm-5" id="'+id+'"><p class="itemIng">'+name+'</p><a href="javascript:deleteIngredient(\''+btoa(id)+'\',\''+btoa(name)+'\')"><i class="fas fa-times-circle"></i></a></li>';
    $('#included').append(newIngredient);
    changeCost();
}
function  deleteIngredient(id,nameIngredient){
    idName='#'+atob(id);
    $(idName).remove();
    option='<option value="'+atob(id)+'" id="'+atob(id)+'" >'+atob(nameIngredient)+'</option>';
    $('#newIngredient').append(option);
    changeCost();
}
function changeCost(){
    ids = "";
    $("#included li").each ( function (){
        ids += $(this).attr("id") + ","; //concateno la misma variable
    })
    $.ajax({ 
        type: 'POST', 
        url: 'controller.php?accion='+btoa('changeCost'), 
        data: { id: btoa(ids) }, 
        dataType: 'json',
        success: function (dataCost) { 
            formatData="Total: <b>€ "+dataCost.costPrice+"</b>";
            $('#price').html(formatData);
        },
        error:function(){
        }
    });
}

