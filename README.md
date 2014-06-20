recdecode
=========
Description:

Command line recursive PHP decoder meant to decode multiple levels of encoding with one execution.
This is only meant to decode PHP using PHP. It really only works with eval encodings, but it can support many functions like base64_decode, strrev, gzinflate etc. 

Javascript will not decode with this script.

This tool is useful because you can use it with another script for automated decoding. If you want to manually decode something and this doesnt work, I would recommend Securi's ddecode.php: http://ddecode.com/phpdecoder/

Usage:
--------
$ recdec.php \<encoded line\>

The decoded line will be output to standard output.

Requirements:
--------
PHP-CLI

Tested on PHP 5.2 and newer. May work on older versions.

Configuration:
--------
Set the interpreter on the first line to your PHP binary which supports PHP-CLI
