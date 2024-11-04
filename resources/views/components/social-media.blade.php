<ul>
    @foreach($socialMedia as $social)
    <li class="mb-10">
        <a href="{{ $social->url }}" target="_blank">
            <i class="{{ $social->icon }} fa-lg fa-fw"></i> {{ $social->name }}
        </a>
    </li>
    @endforeach
</ul>
