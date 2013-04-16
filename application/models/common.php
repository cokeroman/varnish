<?php

Class Common extends CI_Model
{
    function getsnmpvalue($host, $oid) {
        $community = $this->config->item('snmp_community');
        $value = snmp2_get($host, $community, $oid);
        if ($value) {
            preg_match('/.*: [\"]*([\d]*)[\"]?/', $value, $result);
            return $result[1];
        } else {
            return "Error";
        }
    }
    
    function check_http($host) {
        $ch = curl_init("http://$host/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        if ($kk = curl_exec($ch)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function query_agent($host, $query) {
        $port = $this->config->item('varnishagent_port');
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if (socket_connect($socket, $host, $port) == false) {
            return "Imposible conectar al agente";
        } else {
            socket_write($socket, $query, strlen($query));
            $response = "";
            while ($out = socket_read($socket, 2048)) {
                #echo $out . "<br/>";
                $response .= $out;
            }
            socket_close($socket);
            return $response;
        }
        
    }
    
    function getdataxsec($host, $query) {
        $port = $this->config->item('varnishagent_port');
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if (socket_connect($socket, $host, $port) == false) {
            return "Imposible conectar al agente";
        } else {
            socket_write($socket, $query, strlen($query));
            $response1 = socket_read($socket, 1024);
            $reg1 = preg_match('/[a-z_\s]*([0-9]*)\s.*/', $response1, $request1);
            socket_close($socket);
        }
        sleep(1);
        
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if (socket_connect($socket, $host, $port) == false) {
            return "Imposible conectar al agente";
        } else {
            socket_write($socket, $query, strlen($query));
            $response2 = socket_read($socket, 1024);
            $reg2 = preg_match('/[a-z_\s]*([0-9]*)\s.*/', $response2, $request2); 
            socket_close($socket);
        }
               
        $request = $request2[1] - $request1[1];
        
        return $request;
     
    }



    function invalidate($domain, $uri, $cache) {
        $msg = "OK";
        $error = 0;
        $ch = curl_init("http://$cache/");
        // Cabeceras a enviar. Especiales para el purgado
        $header = array("X-Ban-Url: $uri",
                        "X-Ban-Host: $domain");
    
         $opciones = array(CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_CUSTOMREQUEST => 'BAN',
                        CURLOPT_HTTPHEADER => $header,
                        CURLOPT_HEADER => true
                        );

         curl_setopt_array($ch, $opciones);
         if (curl_exec($ch) == FALSE) {
              $msg = "Error";
              $error = 1;
         }
         curl_close($ch);
         return $msg;
     }
}