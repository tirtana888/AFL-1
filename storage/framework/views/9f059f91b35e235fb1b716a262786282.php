

<?php $__env->startSection('title', 'Checkout - ShopMini'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-4">
        <div class="d-flex align-items-center mb-4">
            <div class="d-inline-flex p-3 rounded-circle me-3"
                style="background: linear-gradient(135deg, #11998e20, #38ef7d20);">
                <i class="bi bi-credit-card" style="font-size: 32px; color: #11998e;"></i>
            </div>
            <div>
                <h2 class="fw-bold mb-0">Checkout</h2>
                <p class="text-muted mb-0">Complete your order</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 pt-4 pb-0">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-truck me-2 text-primary"></i>Shipping Information
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="<?php echo e(route('checkout.store')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="mb-4">
                                <label for="shipping_address" class="form-label fw-semibold">
                                    Shipping Address <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="shipping_address" name="shipping_address" rows="4"
                                    placeholder="Enter your complete shipping address including street, city, postal code..."
                                    required><?php echo e(old('shipping_address')); ?></textarea>
                                <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Payment Method <span class="text-danger">*</span>
                                </label>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <input type="radio" class="btn-check" name="payment_method" id="transfer"
                                            value="transfer" <?php echo e(old('payment_method') == 'transfer' ? 'checked' : ''); ?>

                                            required>
                                        <label class="btn btn-outline-primary w-100 py-3" for="transfer">
                                            <i class="bi bi-bank d-block mb-2" style="font-size: 24px;"></i>
                                            Bank Transfer
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" class="btn-check" name="payment_method" id="cod" value="cod" <?php echo e(old('payment_method') == 'cod' ? 'checked' : ''); ?>>
                                        <label class="btn btn-outline-primary w-100 py-3" for="cod">
                                            <i class="bi bi-cash-coin d-block mb-2" style="font-size: 24px;"></i>
                                            Cash on Delivery
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" class="btn-check" name="payment_method" id="ewallet"
                                            value="ewallet" <?php echo e(old('payment_method') == 'ewallet' ? 'checked' : ''); ?>>
                                        <label class="btn btn-outline-primary w-100 py-3" for="ewallet">
                                            <i class="bi bi-phone d-block mb-2" style="font-size: 24px;"></i>
                                            E-Wallet
                                        </label>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger small mt-2"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex gap-3">
                                <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-outline-secondary btn-lg">
                                    <i class="bi bi-arrow-left me-2"></i>Back to Cart
                                </a>
                                <button type="submit" class="btn btn-success btn-lg flex-grow-1">
                                    <i class="bi bi-check-circle me-2"></i>Place Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-transparent border-0 pt-4 pb-2">
                        <h5 class="fw-bold mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <span class="small"><?php echo e(Str::limit($item->product->name, 20)); ?></span>
                                        <span class="badge bg-light text-dark ms-1">x<?php echo e($item->quantity); ?></span>
                                    </div>
                                    <span class="small">Rp
                                        <?php echo e(number_format($item->product->price * $item->quantity, 0, ',', '.')); ?></span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span>Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Shipping</span>
                            <span class="text-success">Free</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold text-success fs-4">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></span>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center text-success mb-2">
                            <i class="bi bi-shield-check me-2"></i>
                            <span class="small fw-semibold">Secure Payment</span>
                        </div>
                        <p class="text-muted small mb-0">Your payment information is encrypted and secure.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\AFL 3\resources\views/checkout/index.blade.php ENDPATH**/ ?>