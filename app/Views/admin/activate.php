<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<title>Activate Account</title>

<form action="<?= base_url() ?>admin/activate/<?= $account->id ?>" method="POST">
    <p class="h1">Activate Account</p>
    <ul class="list-inline">
        <li class="list-inline-item">Please select the center assignment:</li>
        <li class="list-inline-item">
            <select class="form-select" name="selected_center">
                <option selected>-- Select Here --</option>
                <?php foreach ($centers as $center) : ?>
                    <option value="<?= $center->id ?>"><?= $center->name ?></option>
                <?php endforeach ?>
            </select>
        </li>
        <li class="list-inline-item"><button class="btn btn-success" type="submit">Submit</button></li>
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
        </dl>
    </div>
</form>


<?= $this->endSection('content') ?>