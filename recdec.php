#!/usr/bin/php5
<?php
error_reporting(1);
ini_set("display_errors", 0);
ini_set('output_buffering', 'TRUE');
// ini_set('implicit_flush', 'FALSE');

function getInput() {
  $input="";
  $fr = fopen("php://stdin", "r");
  while (!feof ($fr)) {
    $input .= (fgets($fr));
  }
  fclose($fr);
  return $input;
}
$code = trim(getInput());

$replaceEval = array("eval(", '\x65\x76\x61\x6c(');
$replaceTags = array( "<?php", "<?PHP", "<?", "?>");
do {
	$code = str_replace($replaceTags, '', $code);
	$code = trim(preg_replace("/\s+/", "", $code));
	$code = str_replace($replaceEval, 'echo ', $code);
	$code =	preg_replace('/\)/','',$code,1);
	ob_start();
	eval( $code );
	$code = ob_get_clean();
	$semiCount = substr_count($code, ';');
	} while (substr_count($code, "\n") <= 3 && $semiCount <= 3 && $semiCount > 0);
print $code;
?>
