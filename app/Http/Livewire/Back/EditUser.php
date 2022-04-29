<?php

namespace App\Http\Livewire\Back;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;


class EditUser extends Component
{
    use WithFileUploads;
    public $picture, $user, $types, $name, $email, $type_id;

    /**
     * render the component
     * @return void
     **/
    public function render()
    {
        return view('livewire.back.edit-user');
    }

    /**
     * mount the component
     * @return void
     **/
    public function mount($user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->type_id = $user->type_id;
        $user->picture ? $this->picture = Storage::url($user->picture) : $this->picture = null;
    }

    /**
     * update the user
     * @return void
     **/
    public function updateUser() {
        try {
            $this->validate([
                'name' => 'required|min:3|max:255',
                'email' => 'required|email|unique:users,email,' . $this->user->id,
                'type_id' => 'required',
                'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
            
            $user = User::find($this->user->id);
            $user->name = $this->name;
            $user->email = $this->email;
            $user->type_id = $this->type_id;
            $this->picture ? $user->picture = $this->picture->storeAs('public/avatars/'.$user->username, $this->picture->getClientOriginalName()) : '';
            $user->save();
    
            session()->flash('success', __('User updated successfully'));
        } catch (\Exception $e) {
            session()->flash('fail', __($e->getMessage()));
        }
    }
}
