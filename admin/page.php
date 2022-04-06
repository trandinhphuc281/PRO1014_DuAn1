<style>
    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        text-align: center;
    }

    .pagination a.active {
        background-color: dodgerblue;
        color: white;
    }

    .pagination a:hover {
        background-color: #30AADD;
    }
</style>
<div class="pagination">
    <?php for ($num = 1; $num <= $totalPage; $num++) { ?>
        <a href="?per_page=<?php echo $item_per_page ?>&page=<?php echo $num ?>"><?php echo $num ?></a>
    <?php } ?>

</div>