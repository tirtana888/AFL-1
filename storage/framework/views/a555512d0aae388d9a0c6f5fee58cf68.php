<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['product']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['product']); ?>
<?php foreach (array_filter((['product']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="card h-100 shadow-sm">
    <div class="card-body">
        <span class="badge bg-secondary mb-2"><?php echo e($product->category->name); ?></span>
        <h5 class="card-title"><?php echo e($product->name); ?></h5>
        <p class="card-text text-muted small"><?php echo e(Str::limit($product->description, 80)); ?></p>
        <p class="card-text">
            <strong class="text-primary fs-5">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></strong>
        </p>
    </div>
    <div class="card-footer bg-white border-0">
        <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-primary btn-sm w-100">
            <i class="bi bi-eye"></i> View Details
        </a>
    </div>
</div><?php /**PATH C:\Users\lenovo\Downloads\AFL 3\resources\views/components/product-card.blade.php ENDPATH**/ ?>