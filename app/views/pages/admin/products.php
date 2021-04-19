<?php include APPROOT."/views/fragments/header.php"; ?>
<div class="row">
    <div class="col-md-12">
        <h1><?= $data["title"] ?></h1>
        <p>
            <?= $data["description"] ?>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Beschrijving</th>
                    <th scope="col">Prijs</th>
                    <th scope="col">Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["products"] as $product) { ?>
                <tr>
                    <th scope="row"><?= $product->id; ?></th>
                    <td><?= $product->product_name; ?></td>
                    <td><?= $product->product_description; ?></td>
                    <td><?= $product->product_price; ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?= URLROOT . "/admin/product/" . $product->id; ?>">Bekijk</a>
                        <a class="btn btn-danger" href="#">Verwijder</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include APPROOT."/views/fragments/footer.php"; ?>