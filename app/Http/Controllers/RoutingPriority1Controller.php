<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function PHPSTORM_META\map;

class RoutingPriority1Controller extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard');
    }
    public function user()
    {
        $divisions = Division::query()->with(['user'])->get();
        $result = $divisions->map(function ($divisi) {
            return [
                'nama' => $divisi['name'],
                'color' => $divisi['hexa'],
                'user' => $divisi->user()->count()
            ];
        });
        $users = User::query()->count();
        return Inertia::render('Admin/User', ['divisions' => $result, 'users' => $users]);
    }
}
