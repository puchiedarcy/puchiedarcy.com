<?php
class BlogPostRepository extends BaseRepository
{
    public function GetBlogPost($id)
    {
        return $this->GetBlogPosts("where id = $id", 1);
    }

    public function GetLastFiveBlogPosts()
    {
        return $this->GetBlogPosts("", 5);
    }
    
    private function GetBlogPosts($where, $limit)
    {
        $blogPosts = array();
        
        $results = $this->Select("SELECT id, title, body, date FROM blogPosts " . $where . " ORDER BY date desc, id desc limit " . $limit . ";");
        foreach ($results as $result)
        {
            $tags = $this->GetBlogPostTags($result["id"]);
            $blogPost = new BlogPost($result["id"], $result["title"], $result["body"], $tags, $result["date"]);
            array_push($blogPosts, $blogPost);
        }
        
        return $blogPosts;
    }
    
    public function GetLastFiveTaggedBlogPosts($tag)
    {
        return $this->GetBlogPosts("WHERE id IN (SELECT blogPost_id FROM blogPost_tags where tag_id = (SELECT id FROM tags WHERE name = '$tag'))", 5);
    }
    
    public function SaveBlogPost($blogPost)
    {
        $title = $blogPost->Title();
        $date = $blogPost->Date();
        $body = $blogPost->Body();
        
        $this->Execute("INSERT INTO blogPosts (title, date, body) VALUES ('$title', $date, '$body');");
        $blogPost_id = $this->GetLastInsertId();
        
        $tags = $blogPost->Tags();
        foreach ($tags as $tag)
        {
            $extantTag = $this->FindTag($tag->Name());
            if ($extantTag == null)
            {
                $tag_id = $this->SaveTag($tag);
            }
            else
            {
                $tag_id  = $extantTag->Id();
            }
            
            $this->SaveBlogPostTag($blogPost_id, $tag_id);
        }
    }
    
    public function GetTags()
    {
        $tags = array();
        
        $results = $this->Select("SELECT id, name FROM tags ORDER BY id;");
        foreach ($results as $result)
        {
            $tag = new Tag($result["id"], $result["name"]);
            array_push($tags, $tag);
        }
        
        return $tags;
    }
    
    public function GetTag($id)
    {
        $tag = null;
        
        $results = $this->Select("SELECT id, name FROM tags WHERE id = $id LIMIT 1;");
        if (count($results) > 0)
        {
            $result = $results[0];
            $tag = new Tag($result["id"], $result["name"]);
        }
        
        return $tag;
    }
    
    private function GetBlogPostTags($blogPost_id)
    {
        $tags = array();
        
        $results = $this->Select("SELECT tag_id FROM blogPost_tags where blogPost_id = $blogPost_id;");
        foreach ($results as $result)
        {
            $tag = $this->GetTag($result["tag_id"]);
            array_push($tags, $tag);
        }
        
        return $tags;
    }
    
    public function FindTag($name)
    {
        $tag = null;
        
        $results = $this->Select("SELECT id, name FROM tags WHERE name = '$name' LIMIT 1;");
        if (count($results) > 0)
        {
            $result = $results[0];
            $tag = new Tag($result["id"], $result["name"]);
        }
        
        return $tag;
    }
    
    public function SaveTag($tag)
    {
        $name = $tag->Name();
        
        if ($name == "") return;
        
        $this->Execute("INSERT INTO tags (name) VALUES ('$name');");
        
        return $this->GetLastInsertId();
    }
    
    private function SaveBlogPostTag($blogPost_id, $tag_id)
    {
        $this->Execute("INSERT INTO blogPost_tags (blogPost_id, tag_id) VALUES ($blogPost_id, $tag_id);");
    }
}