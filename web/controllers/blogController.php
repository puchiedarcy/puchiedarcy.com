<?php
class blogController extends baseController
{
    public function index($data)
    {
        $blogService = new BlogService();
        
        $this->viewResult->viewModel->blogPosts = $blogService->GetLastFiveBlogPosts();
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
    
    public function tags($data)
    {
        $blogService = new BlogService();
        
        $this->viewResult->viewModel->blogPosts = $blogService->GetLastFiveTaggedBlogPosts($data['tag']);
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
    
    public function single($data)
    {
        $blogService = new BlogService();
        
        $this->viewResult->viewModel->blogPosts = $blogService->GetBlogPost($data['id']);
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
            if (trim($splitTag) == "") continue;
            array_push($tags, new Tag(0, $splitTag));
        }
        
        $blogPost = new BlogPost(0, $data["title"], $data["body"], $tags, $data["date"]);
        
        $blogService = new BlogService();
        $blogService->AddBlogPost($blogPost);
        
        $this->viewResult->viewName = "index";
        
        return $this->viewResult;
    }
}