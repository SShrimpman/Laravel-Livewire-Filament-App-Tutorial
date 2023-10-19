<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Post;
use Livewire\Attributes\Reactive;
use Livewire\Component;

use function PHPSTORM_META\type;

class LikeButton extends Component
{

    // #[Reactive]
    public Post $post;

    // public function mount(Post $post) {
    //     $this->post = $post;
    // }

    public function toggleLike(){
        if(auth()->guest()) {
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        if ($user->hasLiked($this->post)) {
            $user->likes()->detach($this->post->id);

            $this->dispatch(
                'alert', 
                type: 'error',
                title: 'Post disliked.',
                position: 'center',
                timer: 1500,
            );

            return;
        }
        
        $user->likes()->attach($this->post->id);

        // Dispatch a browser event

        $this->dispatch(
            'alert', 
            type: 'success',
            title: 'Post liked.',
            position: 'center',
            timer: 1500,
        );
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
