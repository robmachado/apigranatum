<?php

namespace ApiGranatum;

use Curl\Curl;

class Connector
{
    /**
     * @var Curl
     */
    protected $curl;
    /**
     * Access token from user of API
     * @var string|null
     */
    protected $token;
    /**
     * Version of API
     * @var string|null
     */
    protected $version;
    /**
     * URI to access API in the NET
     * @var string|null
     */
    protected $uri;
    
    /**
     * Constructor
     * @param string|null $token
     * @param string|null $version
     * @param string|null $uri
     */
    public function __construct($token = null, $version = null, $uri = null)
    {
        $this->token = $token;
        $this->version = $version;
        $this->uri = $uri;
        $this->curl = new Curl();
        $this->curl->setHeader('Content-Type', 'application/x-www-form-urlencoded');
    }
    
    /**
     * Destructor close connection with Curl
     */
    public function __destruct()
    {
        $this->curl->close();
    }
    
    /**
     * Build URI for API
     * @param string $path
     * @param array $data
     * @return string
     */
    private function getUri(string $path, array $data = []):string
    {
        $data['access_token'] = $this->token;
        if (is_array($data) || is_object($data)) {
            $data = http_build_query($data);
        }
        return $this->uri . '/' . $this->version . '/' . $path . '?' . $data;
    }
    
    /**
     * Make HTTP POST call to API
     * @param string $path
     * @param array $data
     * @param array $request
     * @return string
     */
    public function post(string $path, array $data = [], array $request = []):string
    {
        $this->curl->post($this->getUri($path, $request), $data);
        return $this->response();
    }
    
    /**
     * Make HTTP PUT call to API
     * @param string $path
     * @param array $data
     * @param array $request
     * @return string
     */
    public function put(string $path, array $data = [], array $request = []):string
    {
        $this->curl->put($this->getUri($path, $request), $data, true);
        return $this->response();
    }
    
    /**
     * Make HTTP DELETE call to API
     * @param string $path
     * @param array $data
     * @param array $request
     * @return string
     */
    public function delete(string $path, array $data = [], array $request = []):string
    {
        $this->curl->delete($this->getUri($path, $request), $data, true);
        return $this->response();
    }
    
    /**
     * Make HTTP GET call to API
     * @param string $path
     * @param array $request
     * @return string
     */
    public function get(string $path, array $request = []):string
    {
        $this->curl->get($this->getUri($path, $request));
        return $this->response();
    }

    /**
     * Gets and treats the API return
     * @return string
     * @throws \Exception
     */
    protected function response():string
    {
        if ($this->curl->isError()) {
            throw new \Exception("Error: "
                . $this->curl->error_message . " [" 
                . $this->curl->response
                . "]"
            );
        }
        return $this->curl->response;
    }
}
