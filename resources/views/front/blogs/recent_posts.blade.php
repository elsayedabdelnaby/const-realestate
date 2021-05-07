<h5 class="font-weight-bold mb-4">Recent Posts</h5>
@foreach ($recent_blogs as $blog)
    <div class="recent-main">
        <div class="recent-img">
            <a href="{{ route('front.blogs.show', $blog->meta_slug) }}"><img
                    src="{{ asset($blog->getImagePathAttribute()) }}" alt="{{ $blog->title }}"></a>
        </div>
        <div class="info-img">
            <a href="{{ route('front.blogs.show', $blog->meta_slug) }}">
                <h6>{{ $blog->title }}</h6>
            </a>
            <p>{{ $blog->created_at }}</p>
        </div>
    </div>
@endforeach
