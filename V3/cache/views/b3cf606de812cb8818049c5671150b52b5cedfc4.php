<?php $__env->startSection('header'); ?>
    <div class="flex items-center">
        <i class="fas fa-edit text-indigo-500 mr-3"></i>
        Modifier l'équipement
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('equipment.partials.form', [
        'action' => '/equipment/' . $equipment->getId(),
        'submitText' => 'Mettre à jour l\'équipement',
        'equipment' => $equipment
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Projet_Noel_2024/V3/app/views/equipment/edit.blade.php ENDPATH**/ ?>