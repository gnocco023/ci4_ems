<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    #app-primary-title {
        font-size: 24px;
        font-weight: 700;
    }

    #app-secondary-title {
        font-size: 18px;
    }
</style>

<title>Update Account Details</title>

<div class="d-flex flex-column justify-content-center align-items-center">
    <div id="app-primary-title" class="mb-3">
        Update Account Details
    </div>
    <div id="app-secondary-title" class="mb-3">
        Modify and ensure that the information is accurate and up-to-date.
    </div>
    <div>

        <?php if (isset($show_div)) : ?>
            <div id="validation_list_errors" class="alert alert-danger">
                <?= validation_list_errors() ?>
            </div>
        <?php endif ?>


        <form action="<?= base_url() ?>admin/update/account_details/<?= $account->id ?>" method="POST">
            <div class="d-flex">
                <div class="form-floating" hidden>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $account->id ?>" hidden>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?= $account->lastname ?>">
                    <label for="lastname" class="form-label">Last Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="<?= $account->firstname ?>">
                    <label for="firstname" class="form-label">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" value="<?= $account->middlename ?>">
                    <label for="middlename" class="form-label">Middle Name</label>
                </div>
            </div>

            <div class="d-flex">
                <fieldset class="mb-3">
                    <legend class="h5">Sex</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="M" <?php if ($account->sex == "M") echo "checked";   ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="F" <?php if ($account->sex == "F") echo "checked";   ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </fieldset>

                <fieldset class="mb-3">
                    <legend class="h5">Service Provider Type</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="service_provider_type" id="CDT" value="1" <?php if ($account->service_provider_type_id == "1") echo "checked"; ?>>
                        <label class="form-check-label" for="CDT">
                            CDT
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="service_provider_type" id="CDW" value="2" <?php if ($account->service_provider_type_id == "2") echo "checked"; ?>>
                        <label class="form-check-label" for="CDW">
                            CDW
                        </label>
                    </div>
                </fieldset>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $account->email ?>">
                <label for="email" class="form-label">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $account->username ?>">
                <label for="username" class="form-label">Username</label>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Submit</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('content') ?>