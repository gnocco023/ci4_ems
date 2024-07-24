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

<title>Register</title>

<div class="d-flex flex-column justify-content-center align-items-center">
    <div id="app-primary-title" class="mb-3">
        Register
    </div>
    <div id="app-secondary-title" class="mb-3">
        Create a new account
    </div>
    <div>

        <?php if (isset($show_div)) : ?>
            <div id="validation_list_errors" class="alert alert-danger">
                <?= validation_list_errors() ?>
            </div>
        <?php endif ?>


        <form action="<?= base_url() ?>account/register" method="POST">
            <div class="d-flex">
                <div class="form-floating">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?= set_value('lastname') ?>">
                    <label for="lastname" class="form-label">Last Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="<?= set_value('firstname') ?>">
                    <label for="firstname" class="form-label">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" value="<?= set_value('middlename') ?>">
                    <label for="middlename" class="form-label">Middle Name</label>
                </div>
            </div>

            <div class="d-flex">
                <fieldset class="mb-3">
                    <legend class="h5">Sex</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="M">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="F">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                </fieldset>

                <fieldset class="mb-3">
                    <legend class="h5">Service Provider Type</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="service_provider_type" id="CDT" value="1">
                        <label class="form-check-label" for="CDT">
                            CDT
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="service_provider_type" id="CDW" value="2">
                        <label class="form-check-label" for="CDW">
                            CDW
                        </label>
                    </div>
                </fieldset>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                <label for="email" class="form-label">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                <label for="username" class="form-label">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="password" value="<?= set_value('password') ?>">
                <label for="password" class="form-label">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm_password" value="<?= set_value('confirm_password') ?>">
                <label for="confirm_password" class="form-label">Confirm Password</label>
            </div>

            <div>
                <a type="button" class="btn btn-secondary" href="<?= base_url() ?>account/login">Back to login</a>
                <button class="btn btn-primary" type="submit">Register my account please</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('content') ?>