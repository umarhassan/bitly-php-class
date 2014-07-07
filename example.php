<style>
.box
{
    background-color: #eeeeee;
    border: 1px dashed;
    border-radius: 21px;
    display: inline-block;
    padding: 20px;
    text-align: center;
}</style>
<script type="text/javascript">
function submit_form()
{

 document.getElementById("myForm").submit();
}
</script>
<div class="box">
<?php

/**
 * @author umar hassan
 * @copyright 2014
 */



require_once('bitly-class.php');

if(isset($_POST['longurl']) && $_POST['longurl'] != "")
{
    $bitly = new bitly('{{OAuth access_token}}');

    // Shorten URL
    echo "Short URL is: " . $short_url = $bitly->shorten($_POST['longurl']);
}
if(isset($_POST['shorturl']) && $_POST['shorturl'] != "")
{
    $bitly = new bitly('{{OAuth access_token}}');

    // Shorten URL
    echo "Long URL is: " . $long_url = $bitly->expand($_POST['shorturl']);
}


?>

<br /><br />


<form action="" method="post" name="myForm" id="myForm">
Enter Original URL Here: <input name="longurl" id="longurl" type="text" /><br /><br />

Enter BITLY Short URL: <input name="shorturl" id="shorturl" type="text" /><br /><br />

<input type="button" name="submit_button" id="submit_button" onclick="submit_form()" value="Submit ...." />

</form>

</div>
