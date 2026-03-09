<?php

namespace Mhakkou\Notifier\Services;
use Mhakkou\Notifier\Traits\Loggable;


class HttpClient {

    public function sendRequest(string $url, array $params):string{
        $curl = \curl_init();

        \curl_setopt($curl, CURLOPT_URL, $url );
        \curl_setopt($curl, CURLOPT_POST, true);
        \curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        \curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        try{
            $res =  \curl_exec($curl);
            if($res == false){
                throw new \RuntimeException(\curl_error($curl));
            }
            return $res;
        }catch(\Exception $e){
            return $e->getMessage();
        }finally{
            \curl_close($curl);
        }
        
    }

}