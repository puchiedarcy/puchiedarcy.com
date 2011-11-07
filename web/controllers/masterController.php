<?php
class masterController extends baseController
{
    public function topbar($data)
    {
        $blogRepo = new BlogPostRepository();
    
        $this->viewResult->viewModel->tags = $blogRepo->GetTags();
        $this->viewResult->viewName = "topbar";
        
        return $this->viewResult;
    }
    
    public function navigation($data)
    {
        $blogRepo = new BlogPostRepository();
        $recentStuff = array();
        
        $tags = $blogRepo->GetTags();
        foreach($tags as $tag)
        {
            $tagName = $tag->Name();
            $recentTaggedPosts = $blogRepo->GetTaggedBlogPosts($tagName, 1);
            $recentStuff[$tagName] = $recentTaggedPosts;
        }
        
        $this->viewResult->viewModel->recentStuff = $recentStuff;
        $this->viewResult->viewName = "navigation";
        
        return $this->viewResult;
    }
    
    public function pager($data)
    {
        $this->viewResult->viewModel->pageData = $data["pageData"];
        $this->viewResult->viewName = "pager";
        
        return $this->viewResult;
    }
}