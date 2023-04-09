<div class="page_redirect">
    <button onclick="changePage(1)">
        <p><span aria-hidden="true">«</span></p>
    </button>
    <button onclick="changePage(<?php echo $page-1 >= 1 ? $page-1 : 1 ?>)">
        <p><span aria-hidden="true">‹</span></p>
    </button>
    <?php foreach(range(1,$noPage) as $page_number): ?>
        <button class="active" onclick="changePage(<?php echo $page_number ?>)">
            <p><?php echo $page_number ?></p>
        </button>
    <?php endforeach ?>
    <button onclick="changePage(<?php echo $page+1 <= $noPage ? $page+1 : $noPage ?>)">
        <p><span aria-hidden="true">›</span></p>
    </button>
    <button onclick="changePage(<?php echo $noPage ?>)">
        <p><span aria-hidden="true">»</span></p>
    </button>
</div>

<script>
function changePage(page) {
    const params = new URLSearchParams(window.location.search)

    params.set('page', page)

    const queryString = `?${params.toString()}`

    window.location= `${queryString}`

}
</script>