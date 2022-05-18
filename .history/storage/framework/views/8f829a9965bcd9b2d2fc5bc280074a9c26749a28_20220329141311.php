<div class="col-lg-12 mt-5">
    <div class="card">
        <h5 class="card-header">Bình luận</h5>
        <?php if(session('status')): ?>
        <div class="mx-2 my-2 alert alert-<?php echo e(session('status')); ?>">
            <?php echo e(session('sttContent')); ?>

        </div>
        <?php endif; ?>
        <form action="<?php echo e(route('client.product-detail.comment')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="product_id" value="<?php echo e($product->masp); ?>">
            <div class="mt-3 mb-3 px-5">
                <textarea class="form-control" name="product_comment" id="exampleFormControlTextarea1" rows="3" placeholder="Viết bình luận của bạn"></textarea>
                <button type="submit" name="main_submit" class="mt-3 btn btn-danger" style="width: 90px">Gửi</button>
            </div>
        </form>
        <hr class="mt-3 mb-3">
        <div class="card-body">
            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <div class="comment-info d-flex align-items-center mb-4">
                <div class="comment-user">
                    <img src="<?php echo e(asset('assets/client/images/img-user.jpg')); ?>" alt="">
                </div>
                <div class="comment-container">
                    <div class="comment-title d-flex ml-2">
                        <h5 class="card-title"><?php echo e($comment->tenkh); ?></h5>
                        <div class="text-dark comment-time"><?php echo e(date_format(date_create($comment->create_at),'d-m-Y')); ?></div>
                    </div>
                    <div class="comment-content">
                        <p class="card-text"><?php echo e($comment->noidung); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>  
    </div><?php /**PATH D:\xampp\htdocs\Code\Laravel\HoangNam\resources\views/client/products/comment.blade.php ENDPATH**/ ?>