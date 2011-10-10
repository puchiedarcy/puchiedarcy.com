<?php
class BlogService
{
    private $blogPostRepository;
    
    function __construct()
    {
        $this->blogPostRepository = new BlogPostRepository();
    }
    
    public function AddBlogPost($blogPost)
    {
        $this->blogPostRepository->SaveBlogPost($blogPost);
    }
    
    public function GetBlogPosts()
    {
        return $this->blogPostRepository->GetBlogPosts();
    }
    
    public function GetTags()
    {
        return $this->blogPostRepository->GetTags();
    }
}