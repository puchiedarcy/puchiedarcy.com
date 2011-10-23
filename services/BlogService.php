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
    
    public function GetBlogPosts($page)
    {
        return $this->blogPostRepository->GetBlogPosts($page);
    }
    
    public function CountBlogPosts()
    {
        return $this->blogPostRepository->CountBlogPosts();
    }
    
    public function GetTaggedBlogPosts($tag, $page)
    {
        return $this->blogPostRepository->GetTaggedBlogPosts($tag, $page);
    }
    
    public function CountTaggedBlogPosts($tag)
    {
        return $this->blogPostRepository->CountTaggedBlogPosts($tag);
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