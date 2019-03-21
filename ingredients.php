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

                  <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-secondary btn-lg btn-block" id="btnSave">Save</button>
                </div>
              </div>
            </div>
        </section>
        

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you finish the purchase?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="secondSave">Save changes</button>
      </div>
    </div>
  </div>
</div>
        
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
             <script src="assets/js/ingredients.min.js"></script>
    </body>
</html>