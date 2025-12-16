

<?php $__env->startSection('title', 'Order History - Laravel E-commerce'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2><i class="bi bi-clock-history"></i> Order History</h2>

        <?php if($orders->count() > 0): ?>
            <div class="mt-4">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Order #<?php echo e($order->id); ?></strong>
                                <span class="badge bg-<?php echo e($order->status == 'pending' ? 'warning' : 'success'); ?> ms-2">
                                    <?php echo e(ucfirst($order->status)); ?>

                                </span>
                            </div>
                            <small class="text-muted"><?php echo e($order->created_at->format('d M Y, H:i')); ?></small>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6>Items:</h6>
                                    <ul class="list-unstyled">
                                        <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="mb-2">
                                                <strong><?php echo e($detail->product->name); ?></strong>
                                                <span class="text-muted">(x<?php echo e($detail->quantity); ?>)</span>
                                                <br>
                                                <small class="text-muted">
                                                    @ Rp <?php echo e(number_format($detail->price_at_purchase, 0, ',', '.')); ?> =
                                                    Rp <?php echo e(number_format($detail->price_at_purchase * $detail->quantity, 0, ',', '.')); ?>

                                                </small>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>

                                    <div class="mt-3">
                                        <strong>Shipping Address:</strong>
                                        <p class="text-muted mb-0"><?php echo e($order->shipping_address); ?></p>
                                    </div>

                                    <div class="mt-2">
                                        <strong>Payment Method:</strong>
                                        <span class="text-muted">
                                            <?php if($order->payment_method == 'transfer'): ?>
                                                Bank Transfer
                                            <?php elseif($order->payment_method == 'cod'): ?>
                                                Cash on Delivery
                                            <?php else: ?>
                                                E-Wallet
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-4 text-end">
                                    <h5 class="text-success">
                                        Total: Rp <?php echo e(number_format($order->total_amount, 0, ',', '.')); ?>

                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info mt-4">
                <i class="bi bi-info-circle"></i> You haven't placed any orders yet.
                <a href="<?php echo e(route('products')); ?>" class="alert-link">Start shopping!</a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\AFL 3\resources\views/orders/history.blade.php ENDPATH**/ ?>