<?php  
$a = shell_exec('bash /var/www/html/ManageGit.sh "/var/www/html/kanoomthai" "https://github.com/jeerawat-hash/kanoomthai.git" ');

//$PayLoad = print_r( json_decode($_POST["payload"],true) );

Linenotify("Pull Trigger \n http://203.156.9.157/kanoomthai \n".date("d-m-Y-H:i:s", filemtime('readme.rst')) ,"VfgkhIoMBtgXpAMz2bk4nTR9YXKoY2gobMNtxacLU8a");
 
//echo date("d-m-Y-H:i:s.", filemtime('readme.rst'));
 
function Linenotify($message,$token){ 

    $lineapi = $token; 
    $mms =  trim($message); 
 //   date_default_timezone_set("Asia/Bangkok");
    $con = curl_init();
    curl_setopt( $con, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
    // SSL USE 
    curl_setopt( $con, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt( $con, CURLOPT_SSL_VERIFYPEER, 0); 
    //POST 
    curl_setopt( $con, CURLOPT_POST, 1); 
    curl_setopt( $con, CURLOPT_POSTFIELDS, "message=$mms"); 
    //curl_setopt( $con, CURLOPT_FOLLOWLOCATION, 1); 
    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', );
      curl_setopt($con, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt( $con, CURLOPT_RETURNTRANSFER, 1); 
    $result = curl_exec( $con ); 

}
?>
