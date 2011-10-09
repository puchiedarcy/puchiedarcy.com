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
}