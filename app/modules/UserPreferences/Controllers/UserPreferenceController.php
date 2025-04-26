<?php

namespace App\Modules\UserPreferences\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\UserPreferences\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPreferenceController extends Controller
{
    /**
     * Display the user preferences page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('UserPreferences.Views.Index', [
            'preferences' => [
                'theme' => $user->theme ?? 'light',
                'language' => $user->language ?? 'es'
            ],
            'availableThemes' => UserPreference::getAvailableThemes(),
            'availableLanguages' => UserPreference::getAvailableLanguages(),
        ]);
    }

    /**
     * Update the user's preferences.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'theme' => ['required', 'string', 'in:' . implode(',', UserPreference::getAvailableThemes())],
            'language' => ['required', 'string', 'in:' . implode(',', UserPreference::getAvailableLanguages())],
        ]);

        $user = Auth::user();
        $user->update([
            'theme' => $validated['theme'],
            'language' => $validated['language'],
            'edit_user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('message', 'Preferencias actualizadas correctamente.');
    }
} 