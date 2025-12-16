

<?php $__env->startSection('title', $product->name . ' - Laravel E-commerce'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('products')); ?>">Products</a></li>
                <li class="breadcrumb-item active"><?php echo e($product->name); ?></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center bg-light"
                        style="min-height: 400px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-image" style="font-size: 100px; color: #ccc;"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <span class="badge bg-secondary mb-2"><?php echo e($product->category->name); ?></span>
                <h2><?php echo e($product->name); ?></h2>
                <h3 class="text-primary mb-4">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></h3>

                <div class="mb-4">
                    <h5>Description</h5>
                    <p class="text-muted"><?php echo e($product->description); ?></p>
                </div>

                <div class="d-grid gap-2">
                    <?php if(auth()->guard()->check()): ?>
                        <form method="POST" action="<?php echo e(route('cart.add', $product)); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </form>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right"></i> Login to Add to Cart
                        </a>
                    <?php endif; ?>

                    <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Product
                    </a>
                </div>

                <div class="mt-3">
                    <small class="text-muted">
                        <i class="bi bi-clock"></i> Added <?php echo e($product->created_at->diffForHumans()); ?>

                    </small>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\AFL 3\resources\views/products/show.blade.php ENDPATH**/ ?>