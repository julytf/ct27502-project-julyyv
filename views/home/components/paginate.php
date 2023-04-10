<div class="page_redirect">
    <button onclick="changePage(1)">
        <p><span aria-hidden="true">«</span></p>
    </button>
    <button onclick="changePage(<?php echo $page-1 >= 1 ? $page-1 : 1 ?>)">
        <p><span aria-hidden="true">‹</span></p>
    </button>
    <?php foreach(range(1,$no_page) as $page_number): ?>
        <button class="<?php if($page == $page_number) echo 'active' ?>" onclick="changePage(<?php echo $page_number ?>)">
            <p><?php echo $page_number ?></p>
        </button>
    <?php endforeach ?>
    <button onclick="changePage(<?php echo $page+1 <= $no_page ? $page+1 : $no_page ?>)">
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

    window.location= `${queryString}`

}
</script>