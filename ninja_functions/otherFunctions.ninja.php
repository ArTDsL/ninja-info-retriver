<?php
/*
- - - - - - - - - - - - - - - - - -
-  _   _  _  _   _   _____   _    -
-  |\  |  |  |\  |     |    / \   -
-  | \ |  |  | \ |     |   /___\  -
-  |  \|  |  |  \|  [__|  /     \ -
- _______________________________ -
-          INFO RETRIVE           -
- - - - - - - - - - - - - - - - - -
-  (c) 2021. Ninja Info Retrive   -
- - - - - - - - - - - - - - - - - -
This code is open-source follow by
GNU-APL V3 License. Check GitHub
official project page to know more.

Created by Arthur "ArT_DsL" Dias
dos Santos Lasso.
___________________________________
(BE AWARE!)
MADE FOR EDUCATIONAL PROPOUSES  ONLY
IF  YOU USE THIS CODE ON COMMERCIAL/
PERSONAL  OR   ANY  OTHER   PRIVATE/
COMERCIAL/GOV APPLICATION IS AT YOUR
OWN RISK, AND FULL RESPONSABILITIES!
___________________________________
*/

//Thanks for "joelremix" for this function, i grab on his github at:
//https://gist.github.com/joelremix/9902470
function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);   
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
//------------------------------------------------------------------