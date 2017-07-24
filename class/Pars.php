<?php
    class Pars 
    {
        
        private $auth;
        private $version;
        private $resource;
        private $params;
        
        public function set_auth($auth)
        {
            if (!isset($this->auth)){
                $this->auth = $auth;
            }            
            return $this;
        }
        public function set_version($version)
        {
            if (!isset($this->version)){
                $this->version = $version;
            } 
            return $this;
        }
        public function set_resource($resource)
        {
            $this->resource = $resource;
            //echo $this->resource;
            return $this;
        }
        public function set_params($params)
        {
            
            $this->params = "?".http_build_query($params);
            return $this;
        }
        
        public function parsing()
        {
            if ($this->auth != '' AND $this->version != '' AND $this->resource != ''){

                $url = "https://api.content.market.yandex.ru/".$this->version."/".$this->resource.".json".$this->params;
                $headers = array(
                  "Host: api.content.market.yandex.ru",
                  "Accept: */*",
                  "Authorization: ".$this->auth.""
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
                curl_setopt($ch, CURLOPT_CAINFO, getcwd() . "\cacert.pem");
                $data = curl_exec($ch);

                if (curl_error($ch) == true)
                {
                    print_r (curl_error($ch));
                } else {
                    return json_decode($data);
                }
                
                curl_close($ch);
            } else {
                echo 'Что-то не так... (не указан авторизационный ключ, версия API или ресурс)';
            }
	    }
    
    }
?>