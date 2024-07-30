<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<a href="#" type="button" class="btn btn-primary my-3">Add Enrollment Summary</a>

<table id="enrollment-summary" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>School Year</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>id</td>
            <td>2023-2024</td>
        </tr>
    </tbody>
</table>


<script>
    $('#enrollment-summary').DataTable();
</script>


<?= $this->endSection('content') ?>