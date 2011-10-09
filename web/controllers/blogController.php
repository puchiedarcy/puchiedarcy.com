<?php
class blogController extends baseController
{
    public function index($data)
    {
        $blogService = new BlogService();
        
        $this->viewResult->viewModel->blogPosts = $blogService->GetBlogPosts();
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
    
    /**
    * @post
    */
    public function addPost($data)
    {
        $blogPost = new BlogPost($data["title"], $data["body"], array("fork", "spoon"), $data["date"]);
        
        $blogService = new BlogService();
        $blogService->AddBlogPost($blogPost);
        
        $this->viewResult->viewName = "add";
        
        return $this->viewResult;
    }
}