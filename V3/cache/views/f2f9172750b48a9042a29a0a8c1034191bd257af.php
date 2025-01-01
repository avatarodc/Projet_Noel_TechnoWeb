<!-- app/views/equipment/partials/form.blade.php -->
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <form action="<?php echo e($action); ?>" method="POST">
                <!-- Nom de l'équipement -->
                <div class="mb-6">
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-700">
                        <i class="fas fa-tag mr-2 text-gray-400"></i>
                        Nom de l'équipement
                    </label>
                    <input type="text" 
                           id="nom" 
                           name="nom" 
                           value="<?php echo e(isset($equipment) ? $equipment->getNom() : ''); ?>"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                  focus:border-indigo-500 focus:ring-indigo-500 
                                  placeholder-gray-400"
                           placeholder="Entrez le nom de l'équipement"
                           required>
                </div>

                <!-- État de l'équipement -->
                <div class="mb-6">
                    <label for="etat" class="block mb-2 text-sm font-medium text-gray-700">
                        <i class="fas fa-info-circle mr-2 text-gray-400"></i>
                        État
                    </label>
                    <select id="etat" 
                            name="etat" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm 
                                   focus:border-indigo-500 focus:ring-indigo-500"
                            required>
                        <?php $__currentLoopData = ['Neuf', 'Bon', 'Moyen', 'Usé']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($option); ?>"
                                <?php echo e((isset($equipment) && $equipment->getEtat() == $option) ? 'selected' : ''); ?>>
                                <?php echo e($option); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Disponibilité -->
                <div class="mb-6">
                    <div class="flex items-center">
                        <div class="flex items-center h-5">
                            <input type="checkbox" 
                                   id="disponibilite" 
                                   name="disponibilite"
                                   <?php echo e((isset($equipment) && $equipment->getDisponibilite()) ? 'checked' : ''); ?>

                                   class="h-4 w-4 rounded border-gray-300 text-indigo-600 
                                          focus:ring-indigo-500">
                        </div>
                        <div class="ml-3">
                            <label for="disponibilite" class="text-sm font-medium text-gray-700">
                                <i class="fas fa-check-circle mr-2 text-gray-400"></i>
                                Disponible
                            </label>
                            <p class="text-sm text-gray-500">
                                Cochez cette case si l'équipement est actuellement disponible
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                    <a href="/equipment" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 
                              rounded-md shadow-sm text-sm font-medium text-gray-700 
                              bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 
                              focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-times mr-2"></i>
                        Annuler
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent 
                                   rounded-md shadow-sm text-sm font-medium text-white 
                                   bg-indigo-600 hover:bg-indigo-700 focus:outline-none 
                                   focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-save mr-2"></i>
                        <?php echo e($submitText); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH /var/www/html/Projet_Noel_2024/V3/app/views/equipment/partials/form.blade.php ENDPATH**/ ?>