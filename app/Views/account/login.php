<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    #app-title {
        font-size: 24px;
        font-weight: 700;
    }
</style>

<div id="login-div" class="d-flex flex-column justify-content-center align-items-center">
    <div class="mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="256" height="256" viewBox="0 0 24 24">
            <path fill="currentColor" d="M21 17v-6.9L12 15L1 9l11-6l11 6v8zm-9 4l-7-3.8v-5l7 3.8l7-3.8v5z" />
        </svg>
    </div>
    <div id="app-title" class="mb-3">
        Enrollment Monitoring System
    </div>
    <div>
        <form>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username">
                <label for="username" class="form-label">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" placeholder="password">
                <label for="password" class="form-label">Password</label>
            </div>

            <div>
                <a type="button" class="btn btn-primary" href="#">Login</a>
                <a type="button" class="btn btn-warning" href="<?= base_url() ?>account/register">Register</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('content') ?>