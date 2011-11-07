<div class="pager">
    <a href="<?php echo $viewModel->pageData->pageLink; ?>page=1">First</a>
    <a href="<?php echo $viewModel->pageData->pageLink; ?>page=<?php echo $viewModel->pageData->prevPage; ?>">Prev</a>
    Page <?php echo $viewModel->pageData->page; ?>
    <a href="<?php echo $viewModel->pageData->pageLink; ?>page=<?php echo $viewModel->pageData->nextPage; ?>">Next</a>
    <a href="<?php echo $viewModel->pageData->pageLink; ?>page=<?php echo $viewModel->pageData->lastPage; ?>">Last</a>
</div>