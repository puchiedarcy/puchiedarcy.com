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
    
    public function GetLastFiveBlogPosts()
    {
        return $this->blogPostRepository->GetLastFiveBlogPosts();
    }
    
    public function GetLastFiveTaggedBlogPosts($tag)
    {
        return $this->blogPostRepository->GetLastFiveTaggedBlogPosts($tag);
    }
    
    public function GetTags()
    {
        return $this->blogPostRepository->GetTags();
    }
    
    public function GetBlogPost($id)
    {
        return $this->blogPostRepository->GetBlogPost($id);
    }
}