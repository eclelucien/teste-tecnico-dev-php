<?php

namespace Eclesiaste\TesteTecnicoDevPhp\helpers;

class Helper{

        public function callApi(int $quantity = 20, int $page = 2){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://randomuser.me/api/?results='.$quantity.'&page='.$page,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
           return $response;
        }

}
