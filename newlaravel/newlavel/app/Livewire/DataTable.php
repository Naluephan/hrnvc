<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Role as ModelRoles;




class DataTable extends Component
{
    public function render()
    {
        $roles = ModelRoles::all();
        return view('livewire.data-table',['roles'=>$roles]);
    }
}
