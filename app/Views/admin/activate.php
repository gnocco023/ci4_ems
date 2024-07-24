<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<title>Admin</title>


<p class="h1">Activate Account</p>
<ul class="list-inline">
    <li class="list-inline-item">Please select the center assignment:</li>
    <li class="list-inline-item"><select class="form-select" aria-label="Default select example">
            <option selected>Center Assignment</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </li>
</ul>

<div>
    <dl class="row">
        <dt class="text-decoration-underline">Account Details:</dt>
        <dd></dd>

        <dt class="col-sm-2">Full Name</dt>
        <dd class="col-sm-9"><?php echo "{$account->lastname}, {$account->firstname} {$account->middlename}"; ?></dd>

        <dt class="col-sm-2">Service Provider Type</dt>
        <dd class="col-sm-9"><?= $account->ConvertServiceProviderType($service_provider_type) ?></dd>

        <dt class="col-sm-2">Email</dt>
        <dd class="col-sm-9"><?= $account->email ?></dd>
    </dl>
</div>

<?= $this->endSection('content') ?>