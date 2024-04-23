<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $rol = Auth::user()->getRolNames()->first();
        // $rol = User::select('*')
        //     ->join('model_has_roles AS m', 'users.id', 'm.model_id')
        //     ->where('users.id', Auth::user()->id)
        //     ->first();

        // dd(Auth::user()->getRoleNames()->first());

        switch (Auth::user()->getRoleNames()->first()) {
            case 'Administrador':
                return redirect()->intended('dashboard/admin');
                // return redirect()->route('dashboard.agente');
                break;

            case 'Agente':
                return redirect()->intended('dashboard/agente');
                break;
        }
    }
}
