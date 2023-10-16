@props(['post'])

<article class="[&:not(:last-child)]:border-b border-gray-700 pb-10">
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
                <img class="mw-100 mx-auto rounded-xl text-gray-400" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex py-1 text-sm items-center">
                <x-posts.author :author="$post->author" size="xs"/>
                <span class="text-gray-600 text-xs">. {{ $post->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-xl font-bold text-gray-400">
                <a wire:navigate href="{{ route('posts.show', $post->slug) }}">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="mt-2 text-base text-gray-500 font-light">
                {{ $post->getExcerpt() }}
            </p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-x-2">
                    @foreach ($post->categories as $category)
                        <x-posts.category-badge :category="$category" />
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600 text-sm">{{ $post->getReadingTime() }} min read</span>
                    </div>
                </div>
                <div>
                    {{-- Este $post é igual a eu fazer :post="post" e deixa de ser necessário eu definir a função mount no component --}}
                    <livewire:like-button :key="'like-' . $post->id" :$post/>
                </div>
            </div>
        </div>
    </div>
</article>