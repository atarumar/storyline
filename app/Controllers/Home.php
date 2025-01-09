<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // Check if the user is logged in
        $isLoggedIn = session()->get('is_logged_in');
        $userEmail = session()->get('user_email');

        // Pass login status and user email to the view
        return view('welcome_message', [
            'isLoggedIn' => $isLoggedIn,
            'userEmail' => $userEmail
        ]);
    }
}
