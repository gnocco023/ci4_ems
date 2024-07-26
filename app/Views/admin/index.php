<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<title>Admin</title>


<p class="h1">Admin View</p>
<p>Below is the list of accounts</p>


<?php if (session()->get('success_message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->get('success_message') ?>
    </div>
<?php endif; ?>


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
                <td><?= $account->type ?></td>
                <td>
                    <div>
                        <?php if ($account->isActivated == 0) : ?>
                            <a href="<?= base_url() ?>admin/activate/<?= $account->id ?>" class="btn btn-success">Activate</a>
                        <?php endif; ?>

                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Update
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= base_url() ?>admin/update/account_details/<?= $account->id ?>">Account Details</a></li>
                                <li><a class="dropdown-item" href="<?= base_url() ?>admin/update/center_assignment/<?= $account->id ?>">Center Assignment</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                        <a href="<?= base_url() ?>admin/delete/<?= $account->id ?>" class="btn btn-danger">Delete</a>


                    </div>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?= $this->endSection('content') ?>