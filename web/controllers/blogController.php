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
        $blogPost = new BlogPost(0, $data["title"], $data["author"], $data["body"], array("fork", "spoon"), $data["date"]);
        
        $blogService = new BlogService();
        $blogService->AddBlogPost($blogPost);
        
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
}