<div class="row">      
    <div class="col-md-6">
        <h6 class="text-muted">
            Mostrando registros
            <span class="font-semibold"><?= $registros['from']?></span> 
            -
            <span class="font-semibold"><?= $registros['to']?></span> 
            de un total de
            <span class="font-semibold"><?= $registros['total']?></span> 
            Registros
        </h6>
    </div>
    <div class="col-md-6">
        <nav aria-label="Search results pages">
            <ul class="pagination custom-pagination justify-content-end">
                <li class="page-item <?= $registros['current_page'] == 1 ? 'disabled' : '' ?>">
                    <a class="page-link text-black" href="<?= $registros['prev_page_url'] . (isset($_GET['search']) ? "&search=" . urlencode($_GET['search']) : '') ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $registros['last_page']; $i++) : 
                    $active = $registros['current_page'] == $i ? 'active' : '';
                ?>
                    <li class="page-item <?= $active ?>">
                        <a class="page-link text-black" href="<?= $registros['uri'] . "?page=" . $i . (isset($_GET['search']) ? "&search=" . urlencode($_GET['search']) : '') ?>"><?= $i ?></a>
                    </li>
                <?php endfor ?>
                <li class="page-item <?= $registros['current_page'] == $registros['last_page'] ? 'disabled' : '' ?>">
                    <a class="page-link text-black" href="<?= $registros['next_page_url'] . (isset($_GET['search']) ? "&search=" . urlencode($_GET['search']) : '') ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
