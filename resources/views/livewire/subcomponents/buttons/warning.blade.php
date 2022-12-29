@if($link != '')
<a
    href="{{ $link }}"
    class="px-2 py-1 disabled:grayscale disabled:cursor-not-allowed text-white font-light tracking-wider bg-yellow-500 hover:bg-yellow-600 hover:-translate-y-1 transition rounded"
    type="submit">{{ $text }}
</a>
@else
<button
    class="px-2 py-1 disabled:grayscale disabled:cursor-not-allowed text-white font-light tracking-wider bg-yellow-500 hover:bg-yellow-600 hover:-translate-y-1 transition rounded"
    type="submit">{{ $text }}
</button>
@endif