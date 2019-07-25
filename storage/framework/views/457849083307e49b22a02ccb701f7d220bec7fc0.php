<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
          <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="container">
    <div class="row">
        <div class="col-md-5">
          <div class="list-group">
<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="/chat/<?php echo e($users->id); ?>" class="list-group-item list-group-item-action"><?php echo e($users->name); ?></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>