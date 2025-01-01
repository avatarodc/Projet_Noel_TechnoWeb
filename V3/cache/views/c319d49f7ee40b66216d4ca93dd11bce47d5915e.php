<?php $__env->startSection('header'); ?>
    <div class="flex items-center">
        <i class="fas fa-plus-circle text-indigo-500 mr-3"></i>
        Ajouter un nouvel animal
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('animal.partials.form', [
        'action' => '/animals',
        'submitText' => 'Ajouter l\'animal'
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Projet_Noel_2024/V3/app/views/animal/create.blade.php ENDPATH**/ ?>