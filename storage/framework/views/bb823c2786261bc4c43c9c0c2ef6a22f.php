

<?php $__env->startSection('title', 'Shopping Cart - ShopMini'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <div class="d-flex align-items-center mb-4">
            <div class="d-inline-flex p-3 rounded-circle me-3"
                style="background: linear-gradient(135deg, #667eea20, #764ba220);">
                <i class="bi bi-cart3" style="font-size: 32px; color: #667eea;"></i>
            </div>
            <div>
                <h2 class="fw-bold mb-0">Shopping Cart</h2>
                <p class="text-muted mb-0">Review and manage your items</p>
            </div>
        </div>

        <?php if($cartItems->count() > 0): ?>
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="border-0 ps-4">Product</th>
                                            <th class="border-0">Price</th>
                                            <th class="border-0">Quantity</th>
                                            <th class="border-0">Subtotal</th>
                                            <th class="border-0 pe-4"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="bg-light rounded p-2 me-3"
                                                            style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                                            <i class="bi bi-box-seam text-muted" style="font-size: 24px;"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 fw-semibold"><?php echo e($item->product->name); ?></h6>
                                                            <small
                                                                class="text-muted"><?php echo e($item->product->category->name ?? 'General'); ?></small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <span class="text-muted">Rp
                                                        <?php echo e(number_format($item->product->price, 0, ',', '.')); ?></span>
                                                </td>
                                                <td class="align-middle">
                                                    <form method="POST" action="<?php echo e(route('cart.update', $item)); ?>" class="d-inline">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PATCH'); ?>
                                                        <div class="input-group" style="width: 120px;">
                                                            <input type="number" name="quantity" class="form-control text-center"
                                                                value="<?php echo e($item->quantity); ?>" min="1">
                                                            <button type="submit" class="btn btn-outline-primary">
                                                                <i class="bi bi-check"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="align-middle">
                                                    <span class="fw-bold text-primary">Rp
                                                        <?php echo e(number_format($item->product->price * $item->quantity, 0, ',', '.')); ?></span>
                                                </td>
                                                <td class="pe-4 align-middle">
                                                    <form method="POST" action="<?php echo e(route('cart.remove', $item)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle"
                                                            onclick="return confirm('Remove this item?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-transparent border-0 pt-4 pb-2">
                            <h5 class="fw-bold mb-0">Order Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Items (<?php echo e($cartItems->sum('quantity')); ?>)</span>
                                <span>Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold">Total</span>
                                <span class="fw-bold text-primary fs-4">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                            </div>
                            <div class="d-grid gap-2">
                                <a href="<?php echo e(route('checkout')); ?>" class="btn btn-success btn-lg">
                                    <i class="bi bi-credit-card me-2"></i>Proceed to Checkout
                                </a>
                                <a href="<?php echo e(route('products')); ?>" class="btn btn-outline-primary">
                                    <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <div class="d-inline-flex p-4 rounded-circle mb-4"
                    style="background: linear-gradient(135deg, #66666620, #99999920);">
                    <i class="bi bi-cart-x" style="font-size: 64px; color: #999;"></i>
                </div>
                <h4 class="fw-bold text-muted">Your cart is empty</h4>
                <p class="text-muted mb-4">Looks like you haven't added any items yet</p>
                <a href="<?php echo e(route('products')); ?>" class="btn btn-primary btn-lg">
                    <i class="bi bi-bag me-2"></i>Start Shopping
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\AFL 3\resources\views/cart/index.blade.php ENDPATH**/ ?>