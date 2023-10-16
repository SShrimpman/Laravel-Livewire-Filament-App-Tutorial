@props(['post'])

<article class="[&:not(:last-child)]:border-b border-gray-700 pb-10">
    <div class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
        <div class="article-thumbnail col-span-4 flex items-center">
            <a href="">
                <img class="mw-100 mx-auto rounded-xl text-gray-400" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            </a>
        </div>
        <div class="col-span-8">
            <div class="article-meta flex py-1 text-sm items-center">
                <img class="w-7 h-7 rounded-full mr-3" src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}">
                <span class="mr-1 text-xs text-gray-400">{{ $post->author->name }}</span>
                <span class="text-gray-600 text-xs">. {{ $post->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-xl font-bold text-gray-400">
                <a href="http://127.0.0.1:8000/blog/first%20post">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="mt-2 text-base text-gray-500 font-light">
                {{ $post->getExcerpt() }}
            </p>
            <div class="article-actions-bar mt-6 flex items-center justify-between">
                <div class="flex gap-x-2">
                    @foreach ($post->categories as $category)
                        <x-badge wire:navigate href="{{ route('posts.index', ['category' => $category->title]) }}"
                                 :textColor="$category->text_color" :bgColor="$category->bg_color">
                            {{ $category->title }}
                        </x-badge>
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600 text-sm">{{ $post->getReadingTime() }} min read</span>
                    </div>
                </div>
                <div>
                    {{-- Este $post é igual a eu fazer :post="post" e deixa de ser necessário eu definir a função mount no component --}}
                    <livewire:like-button :key="$post->id" :$post/>
                </div>
            </div>
        </div>
    </div>
</article>