<div class="brand"><a href="/">PuchieDarcy.com</a></div>
<ul>
<?php
    foreach($viewModel->tags as $tag)
    {
    ?>
        <li><a href="/blog/tags?tag=<?php echo $tag->Name(); ?>"><?php echo $tag->Name(); ?></a></li>
    <?php
    }
?>
</ul>