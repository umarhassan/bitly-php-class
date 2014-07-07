bitly-php-class
===============

Bit.Ly PHP class for shortening URLs and reversing bitly URLs to original URLs

Usage:
<pre><?PHP
require_once('bitly-class.php');

// Code for shortening URL
$bitly = new bitly('{{OAuth access_token}}');

// Shorten URL
$short_url = $bitly->shorten("http://earlysandwich.com");
echo "Short URL is: " . $short_url;

// Code for Expanding URL
$bitly = new bitly('{{OAuth access_token}}');

// Expand URL
$long_url = $bitly->expand("bitly.com/earlysan");
echo "Long URL is: " . $long_url;
?>
</pre>

Tutorial:
http://earlysandwich.com/programming/php/bitly-url-shortner-php-class-572/
