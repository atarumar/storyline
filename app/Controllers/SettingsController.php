<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna;

class SettingsController extends BaseController
{
    public function index()
    {
        // Fetch the current user's data
        $userId = session()->get('user_id');
        $penggunaModel = new Pengguna();
        

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Please log in to access settings.');
        }

        $user = $penggunaModel->find($userId);

        // Pass the user's data to the view
        return view('settings', ['user' => $user]);
    }

    public function update()
    {
        $field = $this->request->getPost('field');
        $value = $this->request->getPost('value');
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Please log in to update settings.');
        }

        $penggunaModel = new Pengguna();

        if ($field === 'password') {
            // Hash the password before saving it
            $value = password_hash($value, PASSWORD_BCRYPT);
        }

        $penggunaModel->update($userId, [$field => $value]);

        return redirect()->to('/settings')->with('message', ucfirst($field) . ' updated successfully.');
    }

    public function delete()
    {
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Please log in to delete your account.');
        }

        $penggunaModel = new Pengguna();
        $penggunaModel->delete($userId);

        // Destroy session and redirect to homepage
        session()->destroy();
        return redirect()->to('/')->with('message', 'Your account has been deleted.');
    }

    public function logout()
    {
        // Destroy the session
        session()->destroy();

        // Redirect to login page with a message
        return redirect()->to('/login')->with('message', 'You have been logged out.');
    }
    
}

