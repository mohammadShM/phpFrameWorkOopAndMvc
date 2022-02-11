
<?php $__env->startSection("title"); ?>
 My Website <?php echo e($slug); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
 <h1>Your Id : <?php echo e($id); ?></h1>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MohammadShM\Desktop\ProjectMe\phpMvc2\App\Views/series/episode.blade.php ENDPATH**/ ?>