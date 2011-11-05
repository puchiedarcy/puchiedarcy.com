<?php
class blogController extends baseController
{
    public function index($data)
    {
        $blogService = new BlogService();
        $page = array_key_exists("page", $data) ? $data["page"] : 1;
        
        $this->viewResult->viewModel->blogPosts = $blogService->GetBlogPosts($page);
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
    
    public function tags($data)
    {
        $blogService = new BlogService();
        $page = array_key_exists("page", $data) ? $data["page"] : 1;
        
        $this->viewResult->viewModel->blogPosts = $blogService->GetTaggedBlogPosts($data["tag"], $page);
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
    
    public function single($data)
    {
        $blogService = new BlogService();
        
        $this->viewResult->viewModel->blogPosts = $blogService->GetBlogPost($data["id"]);
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
    
    /**
    * @post @loggedIn
    */
    public function addPost($data)
    {
        $tags = array();
        
        $splitTags = explode(",", $data["tags"]);
        foreach ($splitTags as $splitTag)
        {
            if (trim($splitTag) == "") continue;
            array_push($tags, new Tag(0, $splitTag));
        }
        
        $blogPost = new BlogPost(0, $data["title"], $data["body"], $tags, $data["date"]);
        
        $blogService = new BlogService();
        $blogService->AddBlogPost($blogPost);
        
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
    
    /**
    * @loggedIn 
    */
    public function add($data)
    {
        $this->viewResult->viewName = "add";
        
        return $this->viewResult;
    }
}