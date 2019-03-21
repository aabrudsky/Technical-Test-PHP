<? 
/**
* @author: Andrea Abrudsky
*/
?>
<!doctype html>
<html>

    <? include "header.php" ?>
    <body onload="ingredientsPizza();">
      <? include "nav.php" ?>
          
        <header class="mastheadPizza">
          <div class="container h-100">
            <div class="row h-100 align-items-center">
              <div class="col-12 text-center" id="namePizza">

              </div>
            </div>
          </div>
        </header>
        <section id="contentTitleblack">
            <div class="container">
              <div id="title" class="title">
                <h1>Choose your favorite ingredientes</h1>    
              </div>

            </div>
        </section>
        <section id="ingredients">
            <div class="container">
              <div class="row">
                 <div class="form-group col-sm-12">
                    <label for="exampleFormControlSelect1">Add New Ingredient</label>
                    <select class="form-control" id="newIngredient" onChange="addIngredient(this);">
                      <option></option>
                      
                    </select>
                  </div>
                <div class="col-sm-4" id="selectedImg">
                </div>
                <div class="col-sm-8">
                  <div class='included' id="includedList">
                      <div class="row titlePrice">
                        <p>Ingredients Included</p> 
                        <p id="price"></p>
                      </div>
                    <ul class="list-group row" id="included">
                    </ul>  
                  </div>
                </div> 
              </div>
              <div class="row justify-content-end">
                <div class="col-md-8">
                  <button type="button" data-toggle="modal" data-target="#modalSave" class="btn btn-secondary btn-lg btn-block" id="btnSave">Save</button>
                </div>
              </div>
            </div>
        </section>
        



        
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="assets/js/ingredients.js"></script>
    </body>
</html>