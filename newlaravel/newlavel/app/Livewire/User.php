<?php

namespace App\Livewire;
use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    public $search = '';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $users = ModelsUser::paginate(5);

        return view('livewire.user',['users'=>ModelsUser::search(['name','email'],$this->search,'contains','or')->paginate(5)]);
    }
}
