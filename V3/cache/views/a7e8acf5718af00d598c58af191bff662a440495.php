<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h2>Modifier l'Animal</h2>
        </div>
        <div class="card-body">
            <?php echo $__env->make('animal.partials.form', [
                'action' => '/animals/' . $animal->getId(),
                'submitText' => 'Mettre à jour',
                'animal' => $animal
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Projet_Noel_2024/V3/app/views/animal/edit.blade.php ENDPATH**/ ?>