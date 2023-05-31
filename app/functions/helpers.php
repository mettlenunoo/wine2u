<?php
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

if (! function_exists('words')) {
    /**
     * Limit the number of words in a string.
     *
     * @param  string  $value
     * @param  int     $words
     * @param  string  $end
     * @return string
     */
    function words($value, $words = 100, $end = '...')
    {
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
}


function strwords($words, $limt){

    $str = trim(strip_tags(html_entity_decode($words)));

    if(strlen($str) > $limt){

      $str = substr($str,0,$limt)." ...";

    }

    return $str;

}

function strip_html_tags($words){

    $str = trim(strip_tags(html_entity_decode($words)));
    return $str;

}


 function filterIds($obj, $sub){

    $ids = [];

    foreach($obj as $id){
        $ids[] = $id->id;
        foreach($id->$sub as $row){
            $ids[] = $row->id;
        }
    }

    return $ids;
}


function rateCalculator($stars,$total_user){

    if($total_user == 0){

        $result = 0;

    }else{

        $result =  ($stars / $total_user) * 100;

    }

   return $result;
}

function send_sms($receiverNumber,$message)
{
    try {
        
        // $to = "+233".$receiverNumber;
        $to = $receiverNumber;
        $username = getenv("NPONTU_USERNAME");
        $password = getenv("NPONTU_PASSWORD");
        $source = getenv("NPONTU_SOURCE");

        $response = Http::post('https://deywuro.com/api/sms', [
            'username' => $username,
            'password' => $password,
            'source' => $source,
            'destination' => $to,
            'message' => $message
        ]);

        \Log::info($response);

    } catch (Exception $e) {

        \Log::info($e->getMessage());
    }
}

   // pagination filter
//  function SearchPagination($parms)
// { 
//        if($_GET[$parms]){

//           empty($this->link) ? $this->link = array($parms => $_GET[$parms]) : array_push($this->link, [$parms => $_GET[$parms]]);
//           return $_GET[$parms];
         
//        } else {

//           return "";

//        }
//    }


