<form method="POST"
    action="<?php echo e(isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php if(isset($task)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <div>
            <label for="title">Title</label>
            <input text="text" name="title" id="title"
                   class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('title')]); ?>"
                   value="<?php echo e($task->title ?? old('title')); ?>" />
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="3"
                      class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('description')]); ?>">
                <?php echo e($task->description ?? old('description')); ?>

            </textarea>
            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
        </div>
        <div>
            <label for="Period">Period</label>
            <textarea name="period" id="period" rows="2"
                      class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500' => $errors->has('period')]); ?>">
                <?php echo e($task->period ?? old('period')); ?>

            </textarea> 
            <?php $__errorArgs = ['period'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="flex gap-2">
            <button class="btn" type="submit">
                <?php if(isset($task)): ?>
                    Update Task
                <?php else: ?>
                    Add Task
                <?php endif; ?>
            </button>
            <a href="<?php echo e(route('tasks.index')); ?>" class="btn">
                Cancel
            </a>
        </div>
    </form><?php /**PATH C:\Users\trung\oWedding-project\resources\views/form.blade.php ENDPATH**/ ?>