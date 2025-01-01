<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2>Ajouter un Équipement</h2>
        </div>
        <div class="card-body">
            <?php echo $__env->make('equipment.partials.form', [
                'action' => '/equipment',
                'submitText' => 'Enregistrer'
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Projet_Noel_2024/V3/app/views/equipment/create.blade.php ENDPATH**/ ?>