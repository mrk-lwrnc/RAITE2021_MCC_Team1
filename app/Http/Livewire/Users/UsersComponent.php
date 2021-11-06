<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::where('role_id', 2)->paginate(10);

        return view('livewire.users.users-component', compact('users'));
    }
}
