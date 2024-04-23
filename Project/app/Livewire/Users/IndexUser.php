<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class IndexUser extends Component
{
    use WithFileUploads;

    public $open = false;
    public $file;
    public $photo;
    public $state = 'Activo';

    public function save()
    {
        try {
            DB::beginTransaction();

            $this->validate(
                [
                    'identification' => 'integer'
                ],
                [
                    'integer' => "Solo se accepta numeros."
                ]
            );

            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = Hash::make($this->identification);
            $user->person_id = $person->id;
            if (!is_null($this->file)) {
                $file = $this->file->store('/public/profile');
                $user->profile_photo_path = $file;
            }
            $user->assignRole(3);
            $user->save();

            DB::commit();
            $this->reset('open', 'name', 'identification', 'email', 'address', 'phone', 'email', 'file');
            $this->render();
            $this->emit('success', 'Abogado creado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            $this->emit('error', 'No se pudo crear el usuario. ' . $e->getMessage());
        }
    }

    public function render()
    {
        $users = User::select('users.name', 'users.email', 'users.profile_photo_path AS photo', 'users.created_at', 'r.name AS rol')
            ->join('model_has_roles AS m', 'users.id', 'm.model_id')
            ->join('roles AS r', 'm.role_id', 'r.id')
            // ->where('users.id', Auth::user()->id)
            ->get();
        // $users = User::all();
        // dd($users);

        return view('livewire.users.index-user', compact('users'))
            ->layout('layouts.app');
    }
}
