<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserComponent extends Component
{
    public $getUsers, $name, $email, $password, $image;

    public function render()
    {
        $this->getUsers = User::all();
        return view('livewire.users.index');
    }

    public function checkId()
    {
        $this->dispatchBrowserEvent('openPagamentoLongModal');
    }

    public function openModal()
    {
        $this->dispatchBrowserEvent('openPagamentoLongModal');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closePagamentoLongModal');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'images' => 'nullable'
        ]);
        $createData = new User();
        $createData->name = $this->name;
        $createData->email = $this->email;
        $createData->password = \bcrypt($this->password);
        if($this->file('image')){
            $file=$this->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            //$file->move(public_path('public/images/users'), $filename);
            $file->storeAs('public/images/users', $filename);
            $createData->images = $filename;
        }
        $createData->save();
        $this->resetInput();
    }
}
