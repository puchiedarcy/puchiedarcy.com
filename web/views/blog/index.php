<div>
    <?php
    foreach ($viewModel->blogPosts as $blogPost)
    {
        ?>
        <div class="blogPost">
            <div class="title"><a href="/blog/single?id=<?php echo $blogPost->Id(); ?>"><?php echo $blogPost->Title(); ?></a></div>
            <div class="metaLeft"></div>
            <div class="metaRight"><?php echo date("D, M d Y", $blogPost->Date()); ?></div>
            <p class="body"><?php echo str_replace("\n", "<br>", $blogPost->Body()); ?></p>
            <div class="tags">
                <?php
                foreach ($blogPost->Tags() as $tag)
                {
                    ?>
                        <span class='tag'><a href="/blog/tags?tag=<?php echo $tag->Name(); ?>"><?php echo $tag->Name(); ?></a></span>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>