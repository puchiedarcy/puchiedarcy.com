<div>
    <?php
    foreach ($viewModel->blogPosts as $blogPost)
    {
        ?>
        <div class="blogPost">
            <div class="title"><?php echo $blogPost->Title(); ?></div>
            <div class="metaLeft"></div>
            <div class="metaRight"><?php echo date("D, M d Y", $blogPost->Date()); ?></div>
            <p class="body"><?php echo str_replace("\n", "<br>", $blogPost->Body()); ?></p>
            <div class="tags">
                <?php
                $tagStr = "";
                foreach ($blogPost->Tags() as $tag)
                {
                    $tagName = $tag->Name();
                    $tagStr = $tagStr . "<span class='tag'>$tagName</span>";
                }
                echo $tagStr;
                ?>
            </div>
        </div>
        <?php
    }
    ?>
    <a href="/blog/add">Write a new post!</a>
</div>