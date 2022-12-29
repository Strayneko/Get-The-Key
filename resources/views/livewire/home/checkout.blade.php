
<div class="border-t mt-8" x-init="@this.on('refreshCart', ()=> alert('1'))">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Total cost</span>
                    <span>Rp{{ number_format($total_price) }}</span>
                </div>
                <button
                    class="bg-primary font-semibold hover:bg-darkerPrimary py-3 text-sm text-white uppercase w-full">Checkout</button>
</div>

