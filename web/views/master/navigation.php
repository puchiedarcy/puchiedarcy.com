<h3>Recent Stuff</h3>
<?php
    foreach($viewModel->recentStuff as $tagName => $blogPosts)
    {
    ?>
    <div class="recent">
        <p><?php echo $tagName; ?></p>
        <ul>
        <?php
            foreach($blogPosts as $blogPost)
            {
            ?>
                <li class="ellipsis"><a href="/blog/single?id=<?php echo $blogPost->Id(); ?>" class="tooltip"><span><?php echo $blogPost->Title(); ?></span><?php echo $blogPost->Title(); ?></a></li>
            <?php
            }
        ?>
        </ul>
    </div>
    <?php
    }
?>

