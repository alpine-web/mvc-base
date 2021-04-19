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
                    <th scope="col">E-mailadres</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["users"] as $user) { ?>
                <tr>
                    <th scope="row"><?= $user->id ?></th>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->admin == 1 ? "Ja" : "Nee"; ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?= URLROOT . "/admin/user/" . $user->id; ?>">Bekijk</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUserModal">
                            Verwijder
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Gebruiker verwijderen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Weet je zeker dat je deze gebruiker wilt verwijderen?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nee</button>
                <a href="<?= URLROOT . "/admin/users/deleteUser/" . $user->id; ?>" class="btn btn-primary">Ja</button>
            </div>
        </div>
    </div>
</div> -->
<?php include APPROOT."/views/fragments/footer.php"; ?>