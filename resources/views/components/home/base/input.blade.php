<input type="{{ $type }}" {{ $attributes->class($classList) }}>

@if ($message)
    <p @class(['text-sm', $messageClassList])>{{ $message }}</p>
@endif