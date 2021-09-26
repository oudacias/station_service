<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


hello


<?= $this->extend('mazer/layouts/vertical-navbar') ?>

<?= $this->section('content') ?>

<style>
  h4{
    color: red !important;
  }
</style>
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Example Content f</h4>
            </div>
            
            <div class="card-body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur quas omnis laudantium tempore
                exercitationem, expedita aspernatur sed officia asperiores unde tempora maxime odio reprehenderit
                distinctio incidunt! Vel aspernatur dicta consequatur!
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>