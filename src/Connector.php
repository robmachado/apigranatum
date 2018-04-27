<?php

namespace ApiGranatum;

class Connector
{
    protected $curl;
    protected $token;
    protected $version;
    protected $uri;
    
    public function __construct($token = null, $version = null, $uri = null)
    {
        $this->token = $token;
        $this->version = $version;
        $this->uri = $uri;
        
        $this->curl = new \Curl\Curl();
        $this->curl->setHeader('Content-Type', 'application/x-www-form-urlencoded');
    }
    
    public function __destruct()
    {
        $this->curl->close();
    }
    
    private function getUri($path, $data = [])
    {
        $data['access_token'] = $this->token;
        if (is_array($data) || is_object($data)) {
            $data = http_build_query($data);
        }
        return $this->uri . '/' . $this->version . '/' . $path . '?' . $data;
    }

    public function post($path, $body = [], $request = [])
    {
        $this->curl->post($this->getUri($path, $request), $body);
        return $this->response();
    }

    public function put($path, $body = [], $request = [])
    {
        $this->curl->put($this->getUri($path, $request), $body, true);
        return $this->response();
    }

    public function delete($path, $body = [], $request = [])
    {
        $this->curl->delete($this->getUri($path, $request), $body, true);
        return $this->response();
    }

    public function get($path, $request = [])
    {
        $this->curl->get($this->getUri($path, $request));
        return $this->response();
    }

    /**
     * Get response from Curl
     * @return string
     * @throws \Exception
     */
    protected function response():string
    {
        if ($this->curl->isError()) {
            throw new \Exception("Error ");
        }
        return $this->curl->response;
    }
}
