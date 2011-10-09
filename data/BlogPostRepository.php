<?php
class BlogPostRepository extends BaseRepository
{
    public function GetBlogPosts()
    {
        $blogPosts = array();
        
        $results = $this->Select("SELECT id, title, author, body, date FROM blogPosts ORDER BY date desc, id desc;");
        foreach ($results as $result)
        {
            $blogPost = new BlogPost($result["id"], $result["title"], $result["author"], $result["body"], array("nes", "cheeve"), $result["date"]);
            array_push($blogPosts, $blogPost);
        }
        
        return $blogPosts;
    }
    
    public function SaveBlogPost($blogPost)
    {
        $title = $blogPost->Title();
        $author = $blogPost->Author();
        $date = $blogPost->Date();
        $body = $blogPost->Body();
        
        $this->Execute("INSERT INTO blogPosts (title, author, date, body) values ('$title', '$author', $date, '$body');");
    }
}