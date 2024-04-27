<?php

namespace App\Livewire\Users;

use App\Models\Country;
use App\Models\IdentificationType;
use App\Models\Persons;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class IndexUser extends Component
{
    use WithFileUploads;

    public $openC = false;
    public $openE = false;
    public $user_id;
    public $user = [];
    public $userE = [];

    public function searchIdentification()
    {
        $this->validate(
            [
                'user.identification' => 'integer'
            ],
            [
                'integer' => "Solo se aceptan numeros."
            ]
        );

        $person = Persons::where('identification', $this->user['identification'])
            ->first();

        if (!is_null($person)) {
            $this->user = [];
            $this->dispatch('info', 'Ya existe usuario registrado con ese número de identificación.');
        }
    }

    public function searchIdentificationE()
    {
        $this->validate(
            [
                'userE.identification' => 'integer'
            ],
            [
                'integer' => "Solo se aceptan numeros."
            ]
        );

        $person = Persons::where('identification', $this->userE['identification'])
            ->first();

        if (!is_null($person)) {
            $this->userE['identification'] = "";
            $this->dispatch('info', 'Ya existe usuario registrado con ese número de identificación.');
        }
    }

    public function save()
    {
        try {
            DB::beginTransaction(); // Iniciar transacción

            // Validar entrada de usuario
            $this->validate(
                [
                    'user.identification_type' => 'required',
                    'user.identification' => 'required|numeric|digits_between:6,11|unique:App\Models\Persons,identification',
                    'user.person' => 'required|min:3|max:255',
                    'user.gender' => 'required',
                    'user.address' => 'required|min:3|max:50',
                    'user.country_id' => 'required',
                    'user.phone' => 'required|numeric|digits_between:3,11',
                    'user.email' => 'required|email|unique:App\Models\User,email',
                    'user.ocupation' => 'required|min:3|max:50',
                    'user.birthdate' => 'required',
                ],
                [
                    'required' => 'Campo obligatorio',
                    'numeric' => 'Solo se permiten números',
                    'digits_between' => 'El :attribute debe tener entre 6 y 11 dígitos',
                    'user.identification.unique' => "El número de identificación ya existe",
                    'min' => 'El campo debe tener más de 3 caracteres',
                    'max' => 'El campo excede el número máximo de caracteres permitidos',
                    'email' => 'Debe ingresar un correo electrónico válido',
                    'user.email.unique' => 'El correo electrónico ingresado ya está registrado',
                ],
                [
                    'user.identification' => 'Número de Identificación',
                    'user.phone' => 'Número de Teléfono',
                    'user.email' => 'Correo Electrónico',
                ],
            );

            // Crear la persona
            $person = new Persons();
            $person->identification_type_id = $this->user['identification_type'];
            $person->identification = $this->user['identification'];
            $person->person = $this->user['person'];
            $person->gender = $this->user['gender'];
            $person->address = $this->user['address'];
            $person->country_id = $this->user['country_id'];
            $person->phone = $this->user['phone'];
            $person->email = $this->user['email'];
            $person->ocupation = $this->user['ocupation'];
            $person->birthdate = $this->user['birthdate'];
            $person->save(); // Guardar persona

            // Crear el usuario
            $user = new User();
            $user->name = $this->user['person'];
            $user->email = $this->user['email'];
            $user->password = Hash::make($this->user['identification']);
            $user->person_id = $person->id; // Relacionar con la persona

            DB::commit(); // Confirmar la transacción

            // Manejar archivo de foto si existe
            if (isset($this->user['photo']) && !empty($this->user['photo'])) {
                $photo = $this->user['photo']->store('/public/profile');
                $user->profile_photo_path = $photo;
            }

            $user->assignRole(2); // Asignar rol
            $user->save(); // Guardar usuario

            // Restablecer el formulario
            // $this->reset('open', 'name', 'identification', 'email', 'address', 'phone', 'email', 'file');
            $this->user = [];
            $this->render();
            $this->dispatch('success', 'Usuario creado correctamente');
        } catch (\Illuminate\Database\QueryException $e) { // Manejo de errores de base de datos
            DB::rollBack();
            $this->dispatch('error', 'No se pudo crear el usuario. ' . $e->getMessage());
        }
    }

    public function edit()
    {
        try {
            DB::beginTransaction(); // Iniciar transacción

            // Validar entrada de usuario
            $this->validate(
                [
                    'userE.identification_type' => 'required',
                    'userE.identification' => 'required|numeric|digits_between:6,11|unique:App\Models\Persons,identification,' . $this->userE['id'],
                    'userE.person' => 'required|min:3|max:255',
                    'userE.gender' => 'required',
                    'userE.address' => 'required|min:3|max:50',
                    'userE.country_id' => 'required',
                    'userE.phone' => 'required|numeric|digits_between:3,11',
                    'userE.email' => 'required|email|unique:App\Models\User,email,' . $this->userE['id'],
                    'userE.ocupation' => 'required|min:3|max:50',
                    'userE.birthdate' => 'required',
                ],
                [
                    'required' => 'Campo obligatorio',
                    'numeric' => 'Solo se permiten números',
                    'digits_between' => 'El :attribute debe tener entre 6 y 11 dígitos',
                    'user.identification.unique' => "El número de identificación ya existe",
                    'min' => 'El campo debe tener más de 3 caracteres',
                    'max' => 'El campo excede el número máximo de caracteres permitidos',
                    'email' => 'Debe ingresar un correo electrónico válido',
                    'userE.email.unique' => 'El correo electrónico ingresado ya está registrado',
                ],
                [
                    'userE.identification' => 'Número de Identificación',
                    'userE.phone' => 'Número de Teléfono',
                    'userE.email' => 'Correo Electrónico',
                ],
            );

            // // Crear la persona
            // $person = new Persons();
            // $person->identification_type_id = $this->user['identification_type'];
            // $person->identification = $this->user['identification'];
            // $person->person = $this->user['person'];
            // $person->gender = $this->user['gender'];
            // $person->address = $this->user['address'];
            // $person->country_id = $this->user['country_id'];
            // $person->phone = $this->user['phone'];
            // $person->email = $this->user['email'];
            // $person->ocupation = $this->user['ocupation'];
            // $person->birthdate = $this->user['birthdate'];
            // $person->save(); // Guardar persona

            // // Crear el usuario
            // $user = new User();
            // $user->name = $this->user['person'];
            // $user->email = $this->user['email'];
            // $user->password = Hash::make($this->user['identification']);
            // $user->person_id = $person->id; // Relacionar con la persona

            // DB::commit(); // Confirmar la transacción

            // Manejar archivo de foto si existe
            // if (isset($this->user['photo']) && !empty($this->user['photo'])) {
            //     $photo = $this->user['photo']->store('/public/profile');
            //     $user->profile_photo_path = $photo;
            // }

            // $user->assignRole(2); // Asignar rol
            // $user->save(); // Guardar usuario

            // Restablecer el formulario
            // $this->reset('open', 'name', 'identification', 'email', 'address', 'phone', 'email', 'file');
            $this->user = [];
            $this->render();
            $this->dispatch('success', 'Usuario editado correctamente');
        } catch (\Illuminate\Database\QueryException $e) { // Manejo de errores de base de datos
            DB::rollBack();
            $this->dispatch('error', 'No se pudo editar el usuario. ' . $e->getMessage());
        }
    }

    public function showEdit($id)
    {
        $this->userE = [];

        $user = User::select('users.*', 'p.*')
            ->join('persons AS p', 'users.person_id', 'p.id')
            ->where('users.id', $id)
            ->first();

        $this->userE['id'] = $user->id;
        $this->userE['identification_type'] = $user->identification_type_id;
        $this->userE['identification'] = $user->identification;
        $this->userE['person'] = $user->person;
        $this->userE['gender'] = $user->gender;
        $this->userE['address'] = $user->address;
        $this->userE['country_id'] = $user->country_id;
        $this->userE['phone'] = $user->phone;
        $this->userE['email'] = $user->email;
        $this->userE['ocupation'] = $user->ocupation;
        $this->userE['birthdate'] = $user->birthdate;
        $this->userE['photo'] = $user->profile_photo_path;

        $this->openE = true;
    }

    /**
     * Emitir confirmacion
     *
     * @return void
     */
    public function desactivate($id)
    {
        $this->user_id = $id;
        $user = User::find($this->user_id);

        if ($user->state == "Activo") {
            $this->dispatch('user-delete-confirmation', text: "Que desea Eliminar el Usuario.");
        } else {
            $this->dispatch('user-activate-confirmation', text: 'Que desea Activar el Usuario.');
        }
    }

    /**
     * Desactivar Usuario
     *
     * @return void
     */
    #[On('deleteConfirmed')]
    #[On('activateConfirmed')]
    public function destroy()
    {
        $user = User::find($this->user_id);

        if ($user->state == "Activo") {
            $user->state = "Inactivo";
            $user->save();
            $this->dispatch('delete');
        } else {
            $user->state = "Activo";
            $user->save();
            $this->dispatch('activate');
        }
    }

    public function render()
    {
        $users = User::select('users.*', 'r.name AS rol')
            ->join('model_has_roles AS m', 'users.id', 'm.model_id')
            ->join('roles AS r', 'm.role_id', 'r.id')
            ->where('r.id', '!=', 1)
            ->get();

        $identificationTypes = IdentificationType::all();
        $countries = Country::all();

        return view('livewire.users.index-user', compact('users', 'identificationTypes', 'countries'))
            ->layout('layouts.app');
    }
}
