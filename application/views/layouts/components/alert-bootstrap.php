<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong></strong> <?= $this->session->flashdata('success'); ?>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('info')): ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>Informasi! , </strong> <?= $this->session->flashdata('info'); ?>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('warning')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Peringatan! , </strong> <?= $this->session->flashdata('warning'); ?>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Oops! , </strong> <?= $this->session->flashdata('error'); ?>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php endif; ?>

<script type="text/javascript">
  $(document).ready(function(){
    
  })
</script>