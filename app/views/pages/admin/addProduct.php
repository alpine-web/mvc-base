<?php include APPROOT."/views/fragments/header.php"; ?>
<div class="row">
    <div class="col-md-12">
        <form method="post">
            <div class="form-group">
                <label for="inputProductName">Productnaam</label>
                <input type="text" name="product_name" class="form-control" id="inputProductName">
            </div>

            <div class="form-group">
                <label for="inputProductDescription">Productbeschrijving</label>
                <input type="text" name="product_description" class="form-control" id="inputProductDescription">
            </div>

            <div class="form-group">
                <label for="inputProductPrice">Productprijs</label>
                <input type="number" step=".01" name="product_price" class="form-control" id="inputProductPrice">
            </div>

            <div class="form-group">
                <label for="inputProductImage">Productprijs</label>
                <input type="text" name="product_image" class="form-control" id="inputProductImage">
            </div>
            
            <button type="submit" class="btn btn-primary">Product toevoegen</button>
        </form>
    </div>
</div>
<?php include APPROOT."/views/fragments/footer.php"; ?>