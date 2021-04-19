<?php include APPROOT."/views/fragments/header.php"; ?>
<div class="row">
    <div class="col-md-12">
        <h1><?= $data["title"] ?> (<?= count($data["cars"]); ?>)</h1>
        <p>
            <?= $data["description"] ?>
        </p>
    </div>
</div>

<script>
    <?php
        $cars = json_encode($data["cars"]);
        echo "var cars = " . $cars . ";\n";
    ?>

    function getCar(value) {
        var car = cars.find(car => car.make === value);

        var html = `
            <div class="card">
                <div class="card-body">
                    <strong>Merk:</strong> ${car.make}<br>
                    <strong>Model:</strong> ${car.model}<br>
                    <strong>Motor Inhoud:</strong> ${car.engine_size}<br>
                    <strong>Prijs:</strong> ${car.price}
                </div>
            </div>
        `;

        document.getElementById("car").innerHTML = html;
    }
</script>

<div class="row">
    <div class="col-md-12">
        <form>
            <div class="form-group">
                <label for="makeSelect">Selecteer een auto</label>
                <select class="form-control" id="makeSelect" onchange="getCar(this.value)">
                    <option disabled selected>Maak een keuze</option>
                    <?php foreach($data["cars"] as $car) { ?>
                        <option value="<?= $car->make; ?>"><?= $car->make; ?></option>
                    <?php } ?>
                </select>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div id="car"></div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-12">
        <div class="card-deck">
            <?php foreach ($data["cars"] as $car) { ?>
                <div class="col-md-4 d-flex align-items-stretch mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $car->make; ?></h5>
                            <p class="card-text"><?= $car->model; ?></p>
                            <p class="card-text"><small class="text-muted"><?= $car->price; ?></small></p>
                        </div>
                        <div class="card-footer">
                            <a href="shop/car/<?= $car->id; ?>" class="btn btn-primary">Bekijk details</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div> -->
<?php include APPROOT."/views/fragments/footer.php"; ?>