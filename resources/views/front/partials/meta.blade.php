<meta name="title" content="{{ $title }}" />
<meta name="keywords" content="{{ $keywords }}" />
<meta name="description" content="{{ $description }}" />
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ $title }}" />
<meta itemprop="image" content="{{ asset('images/uploaded/meta_tags/' . $image) }}">
<meta itemprop="description" content="{{ $description }}" />
<!-- Twitter Card data -->
<meta name='twitter:app:country' content='EG' />
<meta name="twitter:site" content="@FindHouse" />
<meta name="twitter:creator" content="@Constguide" />
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="{{ asset('images/uploaded/meta_tags/' . $image) }}">
<meta name="twitter:description" content="{{ $description }}" />
<!-- Open Graph data -->
<meta property="og:type" content="article" />
<meta property="og:site_name" content="Constguide">
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ $title }}" />
<meta property="og:image" content="{{ asset('images/uploaded/meta_tags/' . $image) }}">
<meta property="og:description" content="{{ $description }}" />
