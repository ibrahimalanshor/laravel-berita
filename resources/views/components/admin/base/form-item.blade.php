<div class="flex flex-col gap-1">
    <label for="{{ $id }}" class="text-neutral-900">{{ $label }}</label>
    {{ $slot }}
    @if ($message)
        <p class="text-sm text-red-700">{{ $message }}</p>
    @endif
</div>