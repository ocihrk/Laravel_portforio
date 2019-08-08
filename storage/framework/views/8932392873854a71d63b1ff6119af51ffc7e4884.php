<?php $__env->startSection('content'); ?>

<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Edit Record</h3>
  <br />
  <?php if(count($errors) > 0): ?>

  <div class="alert alert-danger">
         <ul>
         <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </ul>
  <?php endif; ?>
  <form method="post" action="<?php echo e(action('StudentController@update', $id)); ?>">
   <?php echo e(csrf_field()); ?>

   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="first_name" class="form-control" value="<?php echo e($student->first_name); ?>" placeholder="Enter First Name" />
   </div>
   <div class="form-group">
    <input type="text" name="last_name" class="form-control" value="<?php echo e($student->last_name); ?>" placeholder="Enter Last Name" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>