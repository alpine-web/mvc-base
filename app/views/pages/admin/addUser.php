<?php include APPROOT."/views/fragments/header.php"; ?>
<div class="row">
    <div class="col-md-12">
        <form method="post">
            <div class="form-group">
                <label for="inputUserName">Gebruikersnaam</label>
                <input type="text" name="user_name" class="form-control" id="inputUserName">
            </div>

            <div class="form-group">
                <label for="inputUserEmail">Gebruikers e-mailadres</label>
                <input type="text" name="user_email" class="form-control" id="inputUserEmail">
            </div>

            <div class="form-group">
                <label for="inputUserAdmin">Is de gebruiker admin?</label>
                <input type="number" min="0" max="1" name="user_admin" value="0" class="form-control" id="inputUserAdmin">
            </div>
            
            <button type="submit" class="btn btn-primary">Gebruiker toevoegen</button>
        </form>
    </div>
</div>
<?php include APPROOT."/views/fragments/footer.php"; ?>