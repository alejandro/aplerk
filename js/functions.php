<? php
function makeRequest($token, $url, $method = "GET", $params = null){
       $token = array("access_token" => $token);
 
    if(is_array($parameters)){
            $params = array_merge($parameters, $token);
        } else {
            $params = $token;
        }
        ksort($params);
 
        if($method == "GET"){
            foreach($params as $key => $value){
                $url_params[] = $key . '='. ($value);
            }
 
            $url .= '?'.implode('&',$url_params);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
        if($method == "POST"){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        $response = curl_exec($ch);
        curl_close($ch);
    return $response;
}