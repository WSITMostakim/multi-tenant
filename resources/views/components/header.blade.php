<header
    class="p-4 shadow flex items-center justify-between"
    style="background: {{ $bg ?? '#2563eb' }}; color: {{ $color ?? '#fff' }};">

    {{-- Left side: Title --}}
    <h1 class="text-2xl font-bold">{{ $title ?? 'Panel' }}</h1>

    {{-- Right side: Nav --}}
    <nav class="flex items-center space-x-4">
        @foreach(($links ?? []) as $link)
            <a href="{{ $link['url'] }}" class="hover:underline">{{ $link['label'] }}</a>
        @endforeach
    </nav>
</header>
