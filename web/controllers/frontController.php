<?php
class frontController
{
    private $libs = array("core", "services");
    private $documentRoot;
    private $resourceName;
    private $action;
    private $data;
    
    public function __construct($documentRoot, $uri, $method, $postData)
    {
        foreach ($this->libs as $libName)
        {
            foreach (glob("../$libName/*.php") as $filepath)
            {
                require_once "$filepath";
            }
        }
        
        $this->documentRoot = $documentRoot;
        
        $this->ParseURI($uri);
        $this->ParsePostData($postData);
        
        if ($method == "POST")
        {
            $viewResult = $this->Act($this->ResourceName(), $this->Action(), $this->Data(), "POST");
            $this->action = $viewResult->viewName;
        }
    }
    
    public function ResourceName()
    {
        return $this->resourceName;
    }
    
    public function Action()
    {
        return $this->action;
    }
    
    public function Data()
    {
        return $this->data;
    }
    
    public function Render($front, $resourceName, $action, $data)
    {
        $viewResult = $this->Act($resourceName, $action, $data, "GET");
        
        $viewModel = $viewResult->viewModel;
        
        $viewToRender = $this->documentRoot . "/views/" . $resourceName . "/" . $viewResult->viewName . ".php";
        include $viewToRender;
    }
    
    private function Act($resourceName, $action, $data, $method)
    {
        $fullControllerName = $resourceName . "Controller";
        
        require_once $this->documentRoot . "/controllers/baseController.php";
        require_once $this->documentRoot . "/controllers/" . $fullControllerName . ".php";
        
        $controller = new $fullControllerName();
        
        require_once $this->documentRoot . "/interceptors/HTTPMethodInterceptor.php";
        $controller = new HTTPMethodInterceptor($controller, $method);
        
        return $controller->$action($data);
    }
    
    private function ParseURI($uri)
    {
        $urlComponents = explode("?", $uri);
        
        $this->ParseURIPath($urlComponents[0]);
        
        $queryString = array_key_exists(1, $urlComponents) ? $urlComponents[1] : "";
        $this->ParseQueryString($queryString);
    }
    
    private function ParseURIPath($uriPath)
    {
        $urlArray = explode("/", $uriPath);
        $this->resourceName = empty($urlArray[1]) ? "master" : $urlArray[1];
        $this->action = (count($urlArray) < 3) ? "index" : $urlArray[2];
    }
    
    private function ParseQueryString($queryString)
    {
        $this->data = array();
        $queryStringArray = explode("&", $queryString);
        
        foreach($queryStringArray as $queryStringPair)
        {
            $queryStringPairArray = explode("=", $queryStringPair);
            $this->data[$queryStringPairArray[0]] = array_key_exists(1, $queryStringPairArray) ? $queryStringPairArray[1] : "";
        }
    }
    
    private function ParsePostData($postData)
    {
        foreach($postData as $postedName => $postedValue)
        {
            $this->data[$postedName] = $postedValue;
        }
    }
}