<h5 class="font-weight-bold">@lang('front.category')</h5>
<ul>
    @forelse ($categories as $category)
        <li><a
                href="{{ route('front.blogs.index') . '?category=' . $category->translate(App::getLocale())->meta_slug }}"><i
                    class="fa fa-caret-right"
                    aria-hidden="true"></i>{{ $category->translate(App::getLocale())->name }}</a>
        </li>
    @empty

    @endforelse
</ul>
