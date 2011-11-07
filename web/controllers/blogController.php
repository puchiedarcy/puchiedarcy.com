<?php
class blogController extends baseController
{
    public function index($data)
    {
        $blogRepo = new BlogPostRepository();
        $page = $data["page"];
        $count = $blogRepo->CountBlogPosts();
        
        $this->viewResult->viewModel->blogPosts = $blogRepo->GetBlogPosts($page);
        $this->viewResult->viewName = "index";
        
        $this->AttachPageData($page, $count, $blogRepo->PageSize(), "/blog?&");
        
        return $this->viewResult;
    }
    
    public function tags($data)
    {
        $blogRepo = new BlogPostRepository();
        $page = $data["page"];
        $tag = $data["tag"];
        $count = $blogRepo->CountTaggedBlogPosts($tag);
        
        $this->viewResult->viewModel->blogPosts = $blogRepo->GetTaggedBlogPosts($tag, $page);
        $this->viewResult->viewName = "index";
        
        $this->AttachPageData($page, $count, $blogRepo->PageSize(), "/blog/tags?tag=$tag&");
        
        return $this->viewResult;
    }
    
    public function single($data)
    {
        $blogRepo = new BlogPostRepository();
        $page = 1;
        
        $this->viewResult->viewModel->blogPosts = $blogRepo->GetBlogPost($data["id"]);
        $this->viewResult->viewName = "index";
        
        $this->AttachPageData($page, 1, $blogRepo->PageSize(), "/blog");
        
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
        
        $blogRepo = new BlogPostRepository();
        $blogRepo->SaveBlogPost($blogPost);
        
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