<?php

/**
* This file is part of bit-ly-php
*
* 
*
* googl-php is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

class bitly
{

private $target;
private $token;




function __construct($token = null) {

if ( $token != null ) {
$this->token = $token;

}
}

public function curl($APIurl) {
    
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch,CURLOPT_URL,$APIurl);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
public function shorten($url ,$format='txt') {
    
# Set Google Shortener API target
$this->target = 'https://api-ssl.bitly.com/v3/shorten?';
    

# Set API key if available

$this->target .= 'access_token='.$this->token;


$this->target .= '&longUrl=' . urlencode($url);

$this->target .= '&format=' . $format;

$short_url = $this->curl($this->target);

if ( $format == 'json') {
    
    return json_decode($short_url);
} 
elseif($format == 'txt') {
    
    return $short_url;
}
}

public function expand($url ,$format='txt') {
    
# Set Google Shortener API target
$this->target = 'https://api-ssl.bitly.com/v3/expand?';
    

# Set API key if available

$this->target .= 'access_token='.$this->token;


$this->target .= '&shortUrl=' . urlencode($url);

$this->target .= '&format=' . $format;

$short_url = $this->curl($this->target);

if ( $format == 'json') {
    
    return json_decode($short_url);
} 
elseif($format == 'txt') {
    
    return $short_url;
}
}


}

?>