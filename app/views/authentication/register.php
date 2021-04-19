<?php require APPROOT . "/views/fragments/header.php";?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Registreren</h2>
            <p>Vul aub dit formulier in om te registreren</p>
            <form method="POST">
                <div class="form-group">
                    <label for="name">Naam <sup>*</sup></label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? "is-invalid" : "";?>" value="<?php echo $data['name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email <sup>*</sup></label>
                    <input type="text" name="email" id="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? "is-invalid" : "";?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord <sup>*</sup></label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? "is-invalid" :"";?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Herhaal wachtwoord <sup>*</sup></label>
                    <input type="password" name="confirmpassword" class="form-control form-control-lg <?php echo (!empty($data['confirmpassword_error'])) ? "is-invalid" : "";?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirmpassword_error']; ?></span>
                </div>
                <div class="form-group">
                    <label for="inputGender">Geslacht</label>
                    <select name="gender" id="inputGender" class="form-control form-control-lg <?php echo (!empty($data['gender_error'])) ? "is-invalid" : "";?>" value="<?php echo $data['gender']; ?>">
                        <option disabled>Selecteer een optie</option>
                        <?php foreach ($data["genders"] as $gender) { ?>
                            <option value="<?= $gender->id; ?>"><?= $gender->gender_name; ?></option>
                        <?php } ?>
                    </select>
                    <span class="invalid-feedback"><?php echo $data['gender_error']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/authentication/login" class="btn btn-info btn-block">Al een account? </a>
                    </div>
                    <div class="col">
                        <input type="submit" value="Aanmelden" class="btn btn-success btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . "/views/fragments/footer.php";?>