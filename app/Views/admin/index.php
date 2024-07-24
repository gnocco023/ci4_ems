<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<title>Admin</title>


<p class="h1">Admin View</p>
<p>Below is the list of accounts</p>


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Sex</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">Service Provider Type</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($accounts as $account) : ?>
            <tr>
                <th scope="row"><?= $account->id ?></th>
                <td><?php echo "{$account->lastname}, {$account->firstname} {$account->middlename}"; ?> </td>
                <td><?= $account->sex ?></td>
                <td><?= $account->email ?></td>
                <td><?= $account->username ?></td>
                <td><?php foreach ($service_provider_type as $spt) if ($spt->id == $account->service_provider_type_id) echo $spt->type; ?></td>
                <td>
                    <div>
                        <a href="#" class="btn btn-success">Activate</a>
                        <a href="#" class="btn btn-primary">Update</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?= $this->endSection('content') ?>