<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<title>Delete Account</title>

<form action="<?= base_url() ?>admin/delete/<?= $account->id ?>" method="POST">
    <p class="h1">Delete Account</p>
    <ul class="list-inline">
        <li class="list-inline-item">Are you sure you want to delete this account?</li>
        <li class="list-inline-item"></li>
        <li class="list-inline-item"><button class="btn btn-danger" type="submit">Yes, Delete it now!</button></li>
    </ul>

    <div>
        <dl class="row">
            <dt class="text-decoration-underline">Account Details:</dt>
            <dd></dd>

            <dt class="col-sm-2">Center Start Date</dt>
            <dd class="col-sm-9"><input type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>"></dd>

            <dt class="col-sm-2" hidden>Id</dt>
            <dd class="col-sm-9" hidden><input type="text" name="id" value="<?= $account->id ?>"></dd>

            <dt class="col-sm-2">Full Name</dt>
            <dd class="col-sm-9"><?php echo "{$account->lastname}, {$account->firstname} {$account->middlename}"; ?></dd>

            <dt class="col-sm-2">Service Provider Type</dt>
            <dd class="col-sm-9"><?= $account->type ?></dd>

            <dt class="col-sm-2">Email</dt>
            <dd class="col-sm-9"><?= $account->email ?></dd>

            <dt class="col-sm-2"></dt>
            <dd class="col-sm-9"></dd>

            <dt class="text-decoration-underline">Center Assignment Details:</dt>
            <dd></dd>



            <dt class="col-sm-2">Center Name</dt>
            <dd class="col-sm-9"><?= $account->center_name ?></dd>
            <dt class="col-sm-2">Start Date</dt>
            <dd class="col-sm-9"><?= $account->start_date ?></dd>
            <dt class="col-sm-2">End Date</dt>
            <dd class="col-sm-9"><?= $account->end_date ?></dd>
        </dl>
    </div>
</form>


<?= $this->endSection('content') ?>