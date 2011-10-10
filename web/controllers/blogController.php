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
        $tags = array();
        
        $splitTags = explode(",", $data["tags"]);
        foreach ($splitTags as $splitTag)
        {
            array_push($tags, new Tag(0, trim($splitTag)));
        }
        
        $blogPost = new BlogPost(0, $data["title"], $data["author"], $data["body"], $tags, $data["date"]);
        
        $blogService = new BlogService();
        $blogService->AddBlogPost($blogPost);
        
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
}