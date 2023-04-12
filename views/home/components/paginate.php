<?php
$page_range = 3;
$page_from = $page - $page_range >= 1 ? $page - $page_range : 1;
$page_to = $page + $page_range <= $no_page ? $page + $page_range : $no_page;
?>

<div class="page_redirect">
    <button onclick="changePage(1)">
        <p><span aria-hidden="true">«</span></p>
    </button>
    <button onclick="changePage(<?php echo $page - 1 >= 1 ? $page - 1 : 1 ?>)">
        <p><span aria-hidden="true">‹</span></p>
    </button>
    <?php for ($page_number = $page_from; $page_number <= $page_to; $page_number++) : ?>
        <button class="<?php if ($page == $page_number) echo 'active' ?>" onclick="changePage(<?php echo $page_number ?>)">
            <p><?php echo $page_number ?></p>
        </button>
    <?php endfor ?>
    <button onclick="changePage(<?php echo $page + 1 <= $no_page ? $page + 1 : $no_page ?>)">
        <p><span aria-hidden="true">›</span></p>
    </button>
    <button onclick="changePage(<?php echo $no_page ?>)">
        <p><span aria-hidden="true">»</span></p>
    </button>
</div>

<script>
    function changePage(page) {
        const params = new URLSearchParams(window.location.search)

        params.set('page', page)

        const queryString = `?${params.toString()}`

        window.location = `${queryString}`

    }
</script>