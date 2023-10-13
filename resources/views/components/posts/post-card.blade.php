@props(['post'])

<div {{ $attributes }}>
    <a href="http://127.0.0.1:8000/blog/laravel-34">
        <div>
            <img class="w-full rounded-xl"
                src="{{ $post->getThumbnailUrl() }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-x-2">
            @if ($category = $post->categories()->first())
                <x-badge wire:navigate href="{{ route('posts.index', ['category' => $category->slug]) }}" :textColor="$category->text_color" :bgColor="$category->bg_color">
                    {{ $category->title }}
                </x-badge>
            @endif
            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
        </div>
        <a class="text-xl font-bold text-gray-600">{{ $post->title }}</a>
    </div>

</div>