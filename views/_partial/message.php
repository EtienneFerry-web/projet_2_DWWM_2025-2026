
<?php 
    if (isset($_SESSION['success'])){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
<?php 
    if (count($arrError) > 0) {?>
        <div class="alert alert-danger">
        <?php foreach ($arrError as $strError){ ?>
            <p><?php echo $strError; ?></p>
    <?php }	?>
    </div>
<?php } ?>