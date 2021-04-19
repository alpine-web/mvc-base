<?php include APPROOT."/views/fragments/header.php"; ?>
<div class="row">
    <div class="col-md-12">
        <h1><?= $data["title"] ?> (<?= count($data["products"]); ?>)</h1>
        <p>
            <?= $data["description"] ?>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-deck">
            <?php foreach ($data["products"] as $product) { ?>
                <div class="col-md-4 d-flex align-items-stretch mb-3">
                    <div class="card">
                        <div class="embed-responsive embed-responsive-1by1">
                            <img src="<?= $product->product_image; ?>" class="card-img-top img-responsive embed-responsive-item" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $product->product_name; ?></h5>
                            <p class="card-text"><?= $product->product_description; ?></p>
                            <p class="card-text"><small class="text-muted"><?= $product->product_price; ?></small></p>
                        </div>
                        <div class="card-footer">
                            <a href="shop/product/<?= $product->id; ?>" class="btn btn-primary">Bekijk details</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include APPROOT."/views/fragments/footer.php"; ?>