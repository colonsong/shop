<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">

    <button wire:click="$emit('addProduct', {{ $product->id }})" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></button>
    <a href="demos/shop/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
</div>
