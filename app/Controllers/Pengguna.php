<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ListToken;
use App\Models\Pengguna as PenggunaModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;

class Pengguna extends BaseController
{
    use ResponseTrait;

    /**
     * Handles user registration
     */
    public function daftar()
    {
        log_message('info', 'Starting user registration...');
        $validationRules = [
            'email' => 'required|valid_email|max_length[50]|is_unique[pengguna.email]',
            'password' => 'required|min_length[6]|max_length[255]',
            'nama_lengkap' => 'required|max_length[50]'
        ];
        
        if (!$this->validate($validationRules)) {
            log_message('error', 'Validation failed: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        $data = $this->request->getPost();
        log_message('info', 'Data received: ' . json_encode($data));
    
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    
        $penggunaModel = new PenggunaModel();
        if (!$penggunaModel->insert($data)) {
            log_message('error', 'Database insert failed');
            return redirect()->back()->withInput()->with('errors', ['db' => 'Failed to save user.']);
        }
    
        log_message('info', 'User saved successfully');
        // Automatically log in the user by setting the session
        $newUser = $penggunaModel->where('email', $data['email'])->first();
        session()->set([
            'user_id' => $newUser['pengguna_id'],
            'email' => $newUser['email'],
            'nama_lengkap' => $newUser['nama_lengkap'],
            'is_logged_in' => true
        ]);
    
        log_message('info', 'User session started. Redirecting to home...');
        log_message('info', 'Input data: ' . json_encode($data));
        

        return redirect()->to('/articles');
    }
    

    /**
     * Handles user login and returns a JWT
     */
    public function masuk()
{
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $penggunaModel = new PenggunaModel();
    $user = $penggunaModel->where('email', $email)->first();

    if (!$user || !password_verify($password, $user['password'])) {
        session()->setFlashdata('error', 'Invalid email or password');
        return redirect()->to('/login');
    }

    // Retrieve the JWT secret key
    $key = getenv('JWT_SECRET');
    if (!$key) {
    die('JWT_SECRET is missing or not being read from the .env file.');
    }


    $iat = time();
    $exp = $iat + 86400; // Token valid for 24 hours

    $payload = [
        'iss' => 'StoryLine',
        'aud' => 'StoryLineUsers',
        'iat' => $iat,
        'exp' => $exp,
        'sub' => $user['pengguna_id'],
        'email' => $user['email']
    ];

    // Generate JWT
    $token = JWT::encode($payload, (string) $key, 'HS256');

    // Save token to the database
    $listTokenModel = new ListToken();
    $listTokenModel->insert([
        'pengguna_id' => $user['pengguna_id'],
        'token' => $token,
        'exp_time' => $exp
    ]);

    // Set session and redirect
    session()->set([
        'user_id' => $user['pengguna_id'],
        'email' => $user['email'],
        'nama_lengkap' => $user['nama_lengkap'],
        'is_logged_in' => true
    ]);
    
    
    return redirect()->to('/articles');
}


    public function loginForm()
    {
        // Render the login view
        return view('Login'); // Ensure the 'login.php' file exists in 'app/Views'
    }
    public function daftarForm()
    {
    // Render the signup view
        return view('Signup'); // Ensure the 'signup.php' file exists in 'app/Views'
    }

    /**
     * Retrieves user data and their latest token
     */
    public function getData()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $penggunaModel = new PenggunaModel();
        $user = $penggunaModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return $this->respond([
                'status-code' => 401,
                'message' => 'Invalid email or password'
            ], 401);
        }

        $listTokenModel = new ListToken();
        $tokenData = $listTokenModel->where('pengguna_id', $user['pengguna_id'])
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$tokenData) {
            return $this->respond([
                'status-code' => 404,
                'message' => 'Token not found'
            ], 404);
        }

        return $this->respond([
            'status-code' => 200,
            'message' => 'User data retrieved successfully',
            'data' => $user,
            'token' => $tokenData['token']
        ]);
    }
}
