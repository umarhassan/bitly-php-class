<?php

/**
* This file is part of bit-ly-php
*
* copyright: http://earlysandwich.com/programming/php/bitly-url-shortner-php-class-572/
*
*
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

class bitly{
    
    private $target;
    private $token;
    
    

    
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
