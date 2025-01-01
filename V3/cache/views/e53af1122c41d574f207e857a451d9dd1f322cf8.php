<!-- app/views/animal/partials/form.blade.php -->
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <form action="<?php echo e($action); ?>" method="POST">
                <!-- Type d'animal -->
                <div class="mb-6">
                    <label for="type" class="block mb-2 text-sm font-medium text-gray-700">
                        <i class="fas fa-paw mr-2 text-gray-400"></i>Type d'animal
                    </label>
                    <input type="text" id="type" name="type" 
                           value="<?php echo e(isset($animal) ? $animal->getType() : ''); ?>"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           required
                           placeholder="Ex: Vache, Mouton, etc.">
                </div>

                <!-- Age de l'animal -->
                <div class="mb-6">
                    <label for="age" class="block mb-2 text-sm font-medium text-gray-700">
                        <i class="fas fa-calendar mr-2 text-gray-400"></i>Âge
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" id="age" name="age" 
                               value="<?php echo e(isset($animal) ? $animal->getAge() : ''); ?>"
                               class="block w-full rounded-md border-gray-300 pr-12 focus:border-indigo-500 focus:ring-indigo-500"
                               required
                               placeholder="Age de l'animal">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <span class="text-gray-500 sm:text-sm">ans</span>
                        </div>
                    </div>
                </div>

                <!-- Santé -->
                <div class="mb-6">
                    <label for="sante" class="block mb-2 text-sm font-medium text-gray-700">
                        <i class="fas fa-heart mr-2 text-gray-400"></i>État de santé
                    </label>
                    <select id="sante" name="sante" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                        <?php $__currentLoopData = ['Bonne', 'Moyenne', 'Mauvaise']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($option); ?>" 
                                <?php echo e((isset($animal) && $animal->getSante() == $option) ? 'selected' : ''); ?>>
                                <?php echo e($option); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Équipement -->
                <div class="mb-6">
                    <label for="equipement_id" class="block mb-2 text-sm font-medium text-gray-700">
                        <i class="fas fa-tools mr-2 text-gray-400"></i>Équipement associé
                    </label>
                    <select id="equipement_id" name="equipement_id" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Aucun équipement</option>
                        <?php $__currentLoopData = $equipements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($equipement->getId()); ?>" 
                                <?php echo e((isset($animal) && $animal->getEquipement() && $animal->getEquipement()->getId() == $equipement->getId()) ? 'selected' : ''); ?>>
                                <?php echo e($equipement->getNom()); ?> 
                                (<?php echo e($equipement->getEtat()); ?>)
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Boutons -->
                <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <a href="/animals" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-times mr-2"></i>
                        Annuler
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-save mr-2"></i>
                        <?php echo e($submitText); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH /var/www/html/Projet_Noel_2024/V3/app/views/animal/partials/form.blade.php ENDPATH**/ ?>