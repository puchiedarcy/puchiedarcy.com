<div>
    <?php
    foreach ($viewModel->blogPosts as $blogPost)
    {
        ?>
        <div class="blogPost">
            <div class="title"><?php echo $blogPost->Title(); ?></div>
            <div class="metaLeft"><?php echo $blogPost->Author(); ?></div>
            <div class="metaRight">
                <?php echo date("D, M d Y", $blogPost->Date()); ?>
                <?php
                    $tagStr = "";
                    foreach ($blogPost->Tags() as $tag)
                    {
                        $tagStr = $tagStr . "<span class='tag'>$tag</span>";
                    }
                    echo $tagStr;
                ?>
            </div>
            <p class="body"><?php echo str_replace("\n", "<br><br>", $blogPost->Body()); ?></p>
        </div>
        <?php
    }
    ?>
    <a href="/blog/add">Write a new post!</a>
</div>