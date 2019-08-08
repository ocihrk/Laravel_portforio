<?php $__env->startSection('content'); ?>

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">生徒手帳~Student Data~</h3>
  <br />
  <?php if($message = Session::get('success')): ?>
  <div class="alert alert-success">
   <p><?php echo e($message); ?></p>
  </div>
  <?php endif; ?>
  <div align="right">
   <a href="<?php echo e(route('student.create')); ?>" class="btn btn-primary">Add</a>
   <br />
   <br />
  </div>
  <table class="table table-bordered table-striped">
   <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Edit</th>
    <th>Delete</th>
   </tr>
   <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <tr>
    <td><?php echo e($row['first_name']); ?></td>
    <td><?php echo e($row['last_name']); ?></td>
    <td><a href="<?php echo e(action('StudentController@edit', $row['id'])); ?>" class="btn btn-warning">Edit</a></td>
    <td><form method="post" class="delete_form" action="<?php echo e(action('StudentController@destroy', $row['id'])); ?>">
      <?php echo e(csrf_field()); ?>

      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
 </div>
</div>
<script>
$(document).ready(function(){
 $('.delete_form').on('submit', function(){
  if(confirm("本当に削除してよろしいでしょうか?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>