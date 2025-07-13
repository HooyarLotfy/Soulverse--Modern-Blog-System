<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $post->title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .cover { width: 100%; max-height: 300px; object-fit: cover; margin-bottom: 20px; }
        .gallery img { width: 120px; height: 80px; object-fit: cover; margin: 4px; }
    </style>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p><strong>Category:</strong> {{ $post->category }}</p>
    @if($post->arc)
        <p><strong>Arc:</strong> {{ $post->arc->title }}</p>
    @endif
    @if($post->cover_image)
        <img src="{{ public_path('storage/' . $post->cover_image) }}" class="cover">
    @endif
    <div>{!! $post->body !!}</div>
    @if($post->images && $post->images->count())
        <div class="gallery">
            @foreach($post->images as $img)
                <img src="{{ public_path('storage/' . $img->image_path) }}">
            @endforeach
        </div>
    @endif
</body>
</html>


