<?php
class masterController extends baseController
{
    public function topbar($data)
    {
        $blogService = new BlogService();
    
        $this->viewResult->viewModel->tags = $blogService->GetTags();
        $this->viewResult->viewName = "topbar";
        
        return $this->viewResult;
    }
    
    public function navigation($data)
    {
        $blogService = new BlogService();
        $recentStuff = array();
        
        $tags = $blogService->GetTags();
        foreach($tags as $tag)
        {
            $tagName = $tag->Name();
            $recentTaggedPosts = $blogService->GetLastFiveTaggedBlogPosts($tagName);
            $recentStuff[$tagName] = $recentTaggedPosts;
        }
        
        $this->viewResult->viewModel->recentStuff = $recentStuff;
        $this->viewResult->viewName = "navigation";
        
        return $this->viewResult;
    }
}