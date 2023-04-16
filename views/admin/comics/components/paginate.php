<?php
$page_range = 3;
$page_from = $page - $page_range >= 1 ? $page - $page_range : 1;
$page_to = $page + $page_range <= $no_page ? $page + $page_range : $no_page;
?>


<ul class="pagination m-0 float-right">
    <li class="page-item"><button onclick="changePage(1)" class="page-link">«</button></li>
    <li class="page-item"><button onclick="changePage(<?php echo $page - 1 >= 1 ? $page - 1 : 1 ?>)" class="page-link">‹</button></li>

    <?php for ($page_number = $page_from; $page_number <= $page_to; $page_number++) : ?>
        <li class="page-item<?php if ($page == $page_number) echo ' active' ?>"><button onclick="changePage(<?php echo $page_number ?>)" class="page-link"><?php echo $page_number ?></button></li>
    <?php endfor ?>

    <li class="page-item"><button onclick="changePage(<?php echo $page + 1 <= $no_page ? $page + 1 : $no_page ?>)" class="page-link">›</button></li>
    <li class="page-item"><button onclick="changePage(<?php echo $no_page ?>)" class="page-link">»</button></li>
</ul>

<script>
    function changePage(page) {
        const params = new URLSearchParams(window.location.search)

        params.set('page', page)

        const queryString = `?${params.toString()}`

        window.location = `${queryString}`

    }
</script>