<?php $__env->startSection('title', $task->title); ?>


<?php $__env->startSection('content'); ?>
<p class="mb-4 text-slate-700"><?php echo e($task->description); ?></p>

<?php if($task->period): ?>
    <p class="mb-4 text-slate-700"><?php echo e($task->period); ?></p>
<?php endif; ?>

<p class="mb-4 text-sm text-slate-500">Created <?php echo e($task->created_at->diffForHumans()); ?> • Updated
    <?php echo e($task->updated_at->diffForHumans()); ?></p>

<p class="mb-4">
    <?php if($task->completed): ?>
      <span class="font-medium text-green-500">completed</span>
    <?php else: ?>
      <span class="font-medium text-red-500">Not completed</span>
    <?php endif; ?>
  </p>

  <div class="flex gap-2">
    <form method="POST" action="<?php echo e(route('tasks.toggleComplete', ['task' => $task])); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <button type="submit" class="btn">
        Mark as <?php echo e($task->completed ? 'not completed' : 'completed'); ?>

      </button>
    </form>
  
    <a href="<?php echo e(route('tasks.edit',['task' =>$task])); ?>"
       class="btn">
      Edit task
    </a>

    <form action="<?php echo e(route('tasks.destroy', ['task'=> $task])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn">Delete</button>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\trung\oWedding-project\resources\views/show.blade.php ENDPATH**/ ?>