<? 
/**
* @author: Andrea Abrudsky
*/
?>
<!doctype html>
<html>

    <? include "header.php" ?>
    <body>
      <? include "nav.php" ?>
        
        <header class="masthead">
          <div class="container h-100">
            <div class="row h-100 align-items-center">
              <div class="col-12 text-center">
              </div>
            </div>
          </div>
        </header>
        <section id="contentTitle" class="backgroundRed">
            <div class="container">
              <div id="title" class="title">
                <h1>Select your favorite pizza</h1>    
              </div>

            </div>
        </section>
        <section id="pizzas">
            <div class="container">
              <div class="row">
                <form class="form-inline">
                    <input class="form-control" type="text" placeholder="Search.." id="search">
                </form>
              </div>
              <div class="row">
                <ul id="pizzasRow">
                </ul>
              </div>
            </div>
        </section>


        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
       
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="assets/js/start.min.js"></script>

    </body>
</html>