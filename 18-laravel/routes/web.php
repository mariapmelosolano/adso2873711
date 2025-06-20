<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('sayHello/{name}', function(){
    return "<h1>Hola " .request()->name."👌</h1>";
});

Route::get('pets/all', function() {
    $pets = App\Models\Pet::all();
    //return var_dumo($pets->toArray());
    dd($pets->toArray()); //dump & Die
});

Route::get('pets/{id}', function() {
    $pets = App\Models\Pet::find(request()->id);
    dd($pets->toArray()); //dump & Die
});


Route::get('petsview', function () {
    $pets = App\Models\Pet::all();
    return view('pets-view')->with('pets', $pets);
});

Route::get('petsview/{id}', function () {
    $pet = App\Models\Pet::find(request()->id);
    return view('pet-view')->with('pet', $pet);
});


Route::get('challenge/users', function() {
    $users = App\Models\User::limit(20)->get();
    $result = $users->map(function($user) {
        $fullname = $user->fullname;
        $edad = null;
        if (isset($user->birthdate)) {
            $edad = \Carbon\Carbon::parse($user->birthdate)->age;
        }
        return [
            'fullname' => $fullname,
            'edad' => $edad,
            'photo' => $user->photo ?? null,
            'created_at' => $user->created_at ? $user->created_at->format('Y-m-d H:i:s') : 'N/A'
        ];
    });
    $html = '<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><title>Usuarios</title><style>body{background:linear-gradient(120deg,#f0f4f9 0%,#c9e7fa 100%);font-family:Segoe UI,Arial,sans-serif;}h2{text-align:center;color:#2a4d69;margin-top:30px;}table{border-collapse:collapse;width:85%;margin:40px auto;background:#fff;box-shadow:0 4px 24px rgba(44,62,80,0.10);border-radius:12px;overflow:hidden;}th,td{padding:14px 12px;text-align:center;}th{background:linear-gradient(90deg,#1976d2 0%,#42a5f5 100%);color:#fff;font-size:1.1em;letter-spacing:1px;}tr:nth-child(even){background:#f3f8fc;}tr:nth-child(odd){background:#eaf3fa;}tr:hover{background:#bbdefb;transition:background 0.2s;}img{max-width:80px;max-height:80px;border-radius:8px;box-shadow:0 2px 8px rgba(33,150,243,0.15);}.no-photo{color:#888;font-style:italic;background:#f0f0f0;padding:4px 10px;border-radius:8px;font-size:0.95em;}</style></head><body><h2>Lista de Usuarios</h2><table><thead><tr><th>Nombre Completo</th><th>Edad (años)</th><th>Foto</th><th>Fecha de Registro</th></tr></thead><tbody>';
    foreach ($result as $user) {
        $html .= '<tr>';
        $html .= '<td>' . htmlspecialchars($user['fullname']) . '</td>';
        $html .= '<td>' . ($user['edad'] ?? 'N/A') . '</td>';
        $html .= '<td>';
        if ($user['photo']) {
            $html .= '<img src="' . asset('images/' . $user['photo']) . '" alt="Foto de usuario">';
        } else {
            $html .= '<span class="no-photo">Sin foto</span>';
        }
        $html .= '</td>';
        $html .= '<td>' . htmlspecialchars($user['created_at']) . '</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody></table></body></html>';
    return response($html);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
