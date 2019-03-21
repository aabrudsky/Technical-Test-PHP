var price=0;

$(document).ready(function() {
	consultProducts();

});

function consultProducts(){
	$.ajax({ 
        type: 'POST', 
        url: 'controller.php?accion='+btoa('showAllProducts'), 
		dataType: 'json',
        success: function (data) { 
			viewProduct(data);
        },
        error:function(){
            
        }
    });
}

function viewProduct(data){
	var formatData='';
	$.each(data, function(i, item) {
        $.ajax({ 
            type: 'POST', 
            url: 'controller.php?accion='+btoa('priceProduct'), 
            data: { id: btoa(data[i].id_pizza) }, 
            dataType: 'json',
            success: function (dataCost) { 
                price=dataCost.costPrice;
                ingredients=dataCost.ingredients;
                formatData+='<li class="col-sm-6 col-lg-4" onClick=\'javascript:ingredientsPage("'+btoa(data[i].id_pizza)+'")\'><div class="card"><img class="card-img-top" src="assets/img/'+data[i].img+'" alt="Mi Imagen"><div class="card-body"><div class="card-titlebox"><h4 class="card-title">'+data[i].name+'</h4><h4 class="card-price">€'+price+'</h4></div><p class="card-text"><b>Ingredients :</b><br> '+ingredients+'</p></div> </div> </li> ';
                $('#pizzasRow').html(formatData);
            },
            error:function(){
                
            }
        });
	});
    searchButton();
}

function priceProduct(id){
	id=btoa(id);
	
}
function searchButton(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#pizzasRow li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    
    });
}
function ingredientsPage(id){
  window.location.assign("../ingredients.php?id="+id);
}
function setCost(cost){
   price=cost.toString(); 
}