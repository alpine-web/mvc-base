<?php require APPROOT . "/views/fragments/header.php";?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php flash("register_success"); ?>
            <h2>Inloggen</h2>
            <p>Vul aub dit formulier in om in te loggen</p>
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email <sup>*</sup></label>
                    <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? "is-invalid" : "";?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? "is-invalid" :"";?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Inloggen" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . "/views/fragments/footer.php";?>