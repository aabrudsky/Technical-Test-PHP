<?

/**
* @author: Andrea Abrudsky
*/

//Datos BD
define("USER","rootPizzas");
define("PASS","7pGdN6TmDrwLn5Rq");
define("DBNAME","bd_toro");

if ($_SERVER["SERVER_NAME"] == "toro.localhost.com.ar") {
	define("HOST","localhost"); 
} else {
	define("HOST","toro.localhost.com.ar"); 
}

?>