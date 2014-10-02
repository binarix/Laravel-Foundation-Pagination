<?php
    $presenter = new Chromabits\FoundationPagination\FoundationPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
    <div class="pagination-centered">
        <ul class="pagination">
            <?php echo $presenter->render(); ?>
        </ul>
    </div>
<?php endif; ?>
