<div class="space-y-4">
    <label class="border block border-neutral-300 rounded-lg px-3 py-2 flex items-center justify-between has-checked:border-2 has-checked:border-red-700">
        <div class="flex items-center justify-between gap-3">
            <input type="radio" name="period" value="month" checked class="border-neutral-300 checked:border-red-700 focus:outline-red-700 checked:bg-red-700">
            <p class="font-medium">Bulanan</p>
        </div>
        <p class="font-bold text-2xl text-red-700">{{ number_format($package->monthly_price) }}</p>
    </label>
    <label class="border block border-neutral-300 rounded-lg px-3 py-2 flex items-center justify-between has-checked:border-2 has-checked:border-red-700">
        <div class="flex items-center justify-between gap-3">
            <input type="radio" name="period" value="year" class="border-neutral-300 checked:border-red-700 focus:outline-red-700 checked:bg-red-700">
            <p class="font-medium">Tahunan</p>
        </div>
        <p class="font-bold text-2xl text-red-700">{{ number_format($package->yearly_price) }}</p>
    </label>
</div>