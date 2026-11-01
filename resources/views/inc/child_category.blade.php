@foreach ($child_categories as $child_category)
    <a href="{{ route('category.show', $cat->id) }}">
        <span>{{ $cat->category_name }}</span>
        @if (count($cat->children) > 0)
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 9l6 6l6 -6" />
                </svg>
            </span>
        @endif
    </a>
    @if (count($cat->children) > 0)
        {{-- @dd($cat->children) --}}
        <ul class="submenu">
            @include('inc.child_category', ['child_categories' => $cat->children])
        </ul>
    @endif
@endforeach
