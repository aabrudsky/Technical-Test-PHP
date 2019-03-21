
$(document).ready(function() {
    
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
    var aInclde = [];
    var bNew = [];
    ingredients='';

    console.log(data.lenght);
    data.forEach(function(element) {

        if(element.id_pizza != element.seleccionada){
            console.log("aInclde  s"+element.id_ingredient);
            aInclde.push(element.id_ingredient);
        }else{
            bNew.push(element.id_ingredient);
        }
    })

    data.forEach(function(element) {

            console.log(element.id_ingredient);
        if(aInclde.indexOf(element.id_ingredient )==-1 ){

            console.log(ingreso);
            ingredients='<option value="'+element.id_ingredient+'" id="'+element.id_ingredient+'">'+element.name+'</option>';
            console.log(ingredients);
            $('#newIngredient').append(ingredients);
        }
    })
   
}
function  addIngredient(sel){
    name=$('#newIngredient option:selected').text();
    id=sel.value;
    idName='#'+id;
    $(idName).remove();
    newIngredient='<li class="list-group-item col-sm-5" id="'+id+'"><p class="itemIng">'+name+'</p><a href="javascript:deleteIngredient(\''+btoa(id)+'\',\''+btoa(name)+'\')"><i class="fas fa-times-circle"></i></a></li>';
    $('#included').append(newIngredient);
}
function  deleteIngredient(id,nameIngredient){
    idName='#'+atob(id);
    $(idName).remove();
    option='<option value="'+atob(id)+'" id="'+atob(id)+'" >'+atob(nameIngredient)+'</option>';
    $('#newIngredient').append(option);
}
