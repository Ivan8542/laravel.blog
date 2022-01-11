 <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @foreach($menu as $item)
            <a class="p-2 text-muted" href="{{ $item["path"] }}">{{ $item["name"] }}</a>
        @endforeach
        <br><br><br>
    </nav>
 </div>