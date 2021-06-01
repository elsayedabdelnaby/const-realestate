<h5 class="font-weight-bold mb-4">@lang('front.popular_tags')</h5>
@for ($index = 0; $index < count($popular_tags); $index++)
    <div class="tags">
        <span>
            <a href="{{ route('front.blogs.index') . '?tag=' . $popular_tags[$index]->translate(App::getLocale())->slug }}"
                class="btn btn-outline-primary">{{ $popular_tags[$index]->translate(App::getLocale())->name }}</a>
        </span>
        @php ++$index @endphp
        @if (isset($popular_tags[$index]))
            <span>
                <a href="{{ route('front.blogs.index') . '?tag=' . $popular_tags[$index]->translate(App::getLocale())->slug }}"
                    class="btn btn-outline-primary">{{ $popular_tags[$index]->translate(App::getLocale())->name }}</a>
            </span>
        @endif
    </div>

@endfor
