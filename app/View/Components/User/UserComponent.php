<?php

namespace App\View\Components\User;

use App\Models\User;
use Illuminate\View\Component;

class UserComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $users;
    public function __construct($title, $users)
    {
        $this->title = $title;
        $this->users  = $users;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.user-component');
    }
}
