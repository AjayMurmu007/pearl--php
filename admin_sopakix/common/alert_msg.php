<?php
if (isset($_SESSION['success'])) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Hey...!</strong> <?= $_SESSION['success']; ?>
    </div>
<?php
    unset($_SESSION['success']);
}


if (isset($_SESSION['error'])) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Hey...!</strong> <?= $_SESSION['error']; ?>
    </div>
<?php
    unset($_SESSION['error']);
}

?>