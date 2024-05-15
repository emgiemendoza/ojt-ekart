<ul>
    @foreach($items as $menu_item)
        @if ($menu_item->title === 'Follow Me:')
            {{-- <li>{{ $menu_item->title }}</li> --}}
            {{-- <li><a href="https://10.45.0.94/edci/e-comm/public/admin/login">Administrator</a></li> --}}
        @endif 
        {{-- <li><a href="{{ $menu_item->link() }}"><i class="fa {{ $menu_item->title }}"></i></a></li> --}}
    @endforeach
</ul>
