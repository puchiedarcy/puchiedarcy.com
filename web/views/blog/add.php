Let's add a blog post!
<form method="POST" action="/blog/addPost">
    Title: <input type="text" name="title" /><br>
    <textarea name="body"></textarea><br>
    Date: <input type="text" name="date" value="<?php echo time(); ?>"/><br>
    Tags: <input type="text" name="tags" /><br>
    <input type="submit" />
</form>