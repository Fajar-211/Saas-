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
        $online = User::where('last_activity', '>=', now()->subMinute(5))->count();
        return Inertia::render('Admin/User', ['divisions' => $result, 'users' => $users, 'online' => $online]);
    }
    public function division()
    {
        $totaluser = User::query()->get()->count();
        $divisi = Division::query();
        $totaldivisi = $divisi->get()->count();
        $divisions = $divisi->with(['user'])->get();
        $result = $divisions->map(function ($division) {
            return [
                'name' => $division->name,
                'description' => $division->description,
                'hexa' => $division->hexa,
                'member' => $division->user()->count(),
                'users' => $division->user()->count() >= 5 ? $division->user->take(5) : $division->user
            ];
        });
        return Inertia::render('Admin/Division', ['divisions' => $result, 'Totaluser' => $totaluser, 'Totaldivisi' => $totaldivisi]);
    }
}
