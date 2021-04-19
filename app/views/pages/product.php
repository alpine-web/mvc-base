<?php include APPROOT."/views/fragments/header.php"; ?>
<div class="row">
    <div class="col-md-6">
        <img src="<?= $data["product"][0]->product_image; ?>" width="100%" class="img-responsive">
    </div>
    <div class="col-md-6 mt-5">
        <h5><?= $data["product"][0]->product_name; ?></h5>
        <p><?= $data["product"][0]->product_description; ?></p>
        <p class="small">Artikelnummer: <span><?= $data["product"][0]->id; ?></span></p>
        <h3>&euro; <?= $data["product"][0]->product_price; ?></h3>
    </div>
</div>
<?php include APPROOT."/views/fragments/footer.php"; ?>