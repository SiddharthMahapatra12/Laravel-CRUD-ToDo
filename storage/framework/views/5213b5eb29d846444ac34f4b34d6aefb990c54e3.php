<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <!-- New Task Form -->
                    <form action="<?php echo e(url('task')); ?>" method="POST" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>


                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">New Task :- </label><br><br>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="<?php echo e(old('task')); ?>">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div><br><br>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            <?php if(count($tasks) > 0): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks :-
                    </div><br>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="table-text"><div><?php echo e($task->name); ?></div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="<?php echo e(url('task/'.$task->id)); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('DELETE')); ?>


                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>