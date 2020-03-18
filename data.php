<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* llegim llistat de cotxes */
$json_cotxes = file_get_contents("data/cotxes.json");
$cotxes = json_decode($json_cotxes, true);
$cotxes = $cotxes['cotxes'];
/* echo '<pre>', var_dump($obj['cotxes']), '</pre>'; */

/* llegim les fitxes */
$json_fichas = file_get_contents("data/fichas.json");
$fitxes = json_decode($json_fichas, true);

/* si hi ha un codi de vehicle per la url l'assignam a la variable $car */
if (isset($_GET["code"])) {
    $code = $_GET["code"];
} else {
    $code = "001";

}
$car = $fitxes[$code];

$preus = simplexml_load_file('data/preus.xml');
