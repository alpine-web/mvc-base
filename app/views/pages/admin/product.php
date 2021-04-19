<?php include APPROOT."/views/fragments/header.php"; ?>
<div class="row">
    <div class="col-md-6">
        <img src="<?= $data["product"][0]->product_image; ?>" width="100%" class="img-responsive">
    </div>
    <div class="col-md-6">
        <form method="post">
            <div class="form-group">
                <label for="inputProductName">Productnaam</label>
                <input type="text" name="product_name" value="<?= $data["product"][0]->product_name; ?>" class="form-control" id="inputProductName">
            </div>

            <div class="form-group">
                <label for="inputProductDescription">Productbeschrijving</label>
                <input type="text" name="product_description" value="<?= $data["product"][0]->product_description; ?>" class="form-control" id="inputProductDescription">
            </div>

            <div class="form-group">
                <label for="inputProductPrice">Productprijs</label>
                <input type="number" step=".01" name="product_price" value="<?= $data["product"][0]->product_price; ?>" class="form-control" id="inputProductPrice">
            </div>

            <div class="form-group">
                <label for="inputProductImage">Productprijs</label>
                <input type="text" name="product_image" value="<?= $data["product"][0]->product_image; ?>" class="form-control" id="inputProductImage">
            </div>
            
            <button type="submit" class="btn btn-primary">Product bijwerken</button>
        </form>
    </div>
</div>
<?php include APPROOT."/views/fragments/footer.php"; ?>