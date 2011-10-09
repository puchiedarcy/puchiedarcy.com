<?php
class BlogService
{
    private $posts;
    
    function __construct()
    {
        $this->posts = array();
        
        array_push($this->posts, new BlogPost("Lorem ipsum", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", array("nes"), 1318192925));
        array_push($this->posts, new BlogPost("Lorem ipsum", "Repudiare intellegat sadipscing ius ea, ne eum diam albucius adolescens. Ei his nullam ignota. Noster luptatum intellegebat et his. Ad modus zril quando vix. No aliquam aliquando est, vis ut harum nusquam disputationi. Vix no wisi verear virtute.\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", array("nes", "cheeve"), 1318192925));
        array_push($this->posts, new BlogPost("Lorem ipsum", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", array("nes", "hack", "glitch"), 1318192925));
        array_push($this->posts, new BlogPost("Lorem ipsum", "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", array("nes"), 1318192925));
    }
    
    public function AddBlogPost($post)
    {
        array_push($this->posts, $post);
    }
    
    public function GetBlogPosts()
    {
        return $this->posts;
    }
}