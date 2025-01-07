<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    }

    body {
      background-color: #f9f9f9;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 16px;
    }

    .card {
      background: white;
      border: 1px solid #e5e5e5;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      padding: 16px;
    }

    .card-header {
      margin-bottom: 16px;
    }

    .card-title {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 8px;
    }

    .card-description {
      color: #6b7280;
      font-size: 0.875rem;
    }

    .form-group {
      margin-bottom: 16px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-size: 0.875rem;
      font-weight: 500;
      color: #374151;
    }

    input {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #d1d5db;
      border-radius: 4px;
      font-size: 1rem;
    }

    input:disabled {
      background-color: #f3f4f6;
      cursor: not-allowed;
    }

    .card-footer {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .btn {
      display: block;
      width: 100%;
      padding: 0.75rem;
      font-size: 1rem;
      text-align: center;
      color: white;
      background-color: #1a8917;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn:disabled {
      background-color: #6b7280;
      cursor: not-allowed;
    }

    .text-sm {
      font-size: 0.875rem;
    }

    .text-center {
      text-align: center;
    }

    .text-muted {
      color: #6b7280;
    }

    .text-primary {
      color: #1a8917;
    }

    .text-primary:hover {
      text-decoration: underline;
    }

    .underline {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="card-header">
      <h1 class="card-title">Login</h1>
      <p class="card-description">Enter your email and password to login to your account</p>
    </div>
    <form action="<?= base_url('/masuk') ?>" method="POST">
      <?= csrf_field() ?>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="name@example.com" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn">Login</button>
        <p class="text-sm text-center text-muted">
          Don’t have an account? 
          <a href="<?= base_url('/signup') ?>" class="text-primary underline">Sign up</a>
        </p>
      </div>
    </form>
  </div>
</body>
</html>
