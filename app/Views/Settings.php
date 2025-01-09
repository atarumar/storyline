<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - StoryLine</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        body {
            background-color: #fff;
            color: #242424;
        }

        .nav {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: bold;
            font-size: 1.5rem;
            text-decoration: none;
            color: #000;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        .main-content {
            max-width: 680px;
        }

        .page-title {
            font-size: 2.5rem;
            margin-bottom: 2rem;
        }

        .tabs {
            display: flex;
            gap: 2rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .tab {
            padding: 1rem 0;
            color: #6b6b6b;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .tab.active {
            color: #000;
            border-bottom: 1px solid #000;
        }

        .settings-section {
            margin-bottom: 2rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        .settings-section:last-child {
            border-bottom: none;
        }

        .section-header {
            margin-bottom: 0.5rem;
        }

        .section-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .section-description {
            color: #6b6b6b;
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        .value {
            color: #6b6b6b;
        }

        .edit-link {
            color: #1a8917;
            text-decoration: none;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            width: 400px;
            max-width: 90%;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .modal-close {
            cursor: pointer;
            font-size: 1.2rem;
            color: #000;
        }

        .modal-footer {
            margin-top: 1rem;
            display: flex;
            justify-content: flex-end;
        }

        .modal-footer button {
            padding: 0.5rem 1rem;
            border: none;
            background: #1a8917;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
        }

        .modal-footer button.cancel {
            background: #6b6b6b;
            margin-right: 1rem;
        }
        .danger-zone {
            margin-top: 3rem;
        }

        .danger-button {
            color: #ff4040;
            text-decoration: none;
        }

        .help-section {
            background: #fafafa;
            padding: 1.5rem;
            border-radius: 4px;
        }

        .help-title {
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .help-links {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .help-link {
            color: #242424;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .help-link:hover {
            color: #1a8917;
        }

        .logout-button {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            background: #000;
            color: #fff;
            border: none;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-button:hover {
            background: #242424;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }

            .help-section {
                display: none;
            }
        }
    </style>
</head>
<body>
    <nav class="nav">
        <a href="/articles" class="logo">StoryLine</a>
    </nav>

    <div class="container">
        <main class="main-content">
            <h1 class="page-title">Settings</h1>

            <nav class="tabs">
                <a href="#" class="tab active">Account</a>
            </nav>


            <div class="settings-section">
                <h2>Email address</h2>
                <div class="section-content">
                    <span class="value"><?= esc($user['email']) ?></span>
                    <a class="edit-link" data-field="email" onclick="openModal('email')">Edit</a>
                </div>
            </div>

            <div class="settings-section">
                <h2>Username</h2>
                <div class="section-content">
                    <span class="value"><?= esc($user['nama_lengkap']) ?></span>
                    <a class="edit-link" data-field="username" onclick="openModal('username')">Edit</a>
                </div>
            </div>

            <div class="settings-section">
                <h2>Password</h2>
                <div class="section-content">
                    <span class="value">********</span>
                    <a class="edit-link" data-field="password" onclick="openModal('password')">Edit</a>
                </div>
            </div>
            
            <a href="<?= base_url('/logout') ?>" class="logout-button">Sign out</a>

        </main>
        <aside class="help-section">
            <h2 class="help-title">Suggested help articles</h2>
            <div class="help-links">
                <a href="#" class="help-link">Sign in or sign up to StoryLine</a>
                <a href="#" class="help-link">Your profile page</a>
                <a href="#" class="help-link">Writing and publishing your first story</a>
                <a href="#" class="help-link">About StoryLine's distribution system</a>
                <a href="#" class="help-link">Get started with the Partner Program</a>
            </div>
        </aside>

    </div>
    </div>
    
    <!-- Modals -->
    <div id="modal-email" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Email</h3>
                <span class="modal-close" onclick="closeModal('email')">&times;</span>
            </div>
            <form action="<?= base_url('/settings/update') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="field" value="email">
                <input type="email" name="value" placeholder="New Email" required>
                <div class="modal-footer">
                    <button type="button" class="cancel" onclick="closeModal('email')">Cancel</button>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-username" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Username</h3>
                <span class="modal-close" onclick="closeModal('nama_lengkap')">&times;</span>
            </div>
            <form action="<?= base_url('/settings/update') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="field" value="nama_lengkap">
                <input type="text" name="value" placeholder="New Username" required>
                <div class="modal-footer">
                    <button type="button" class="cancel" onclick="closeModal('nama_lengkap')">Cancel</button>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-password" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Password</h3>
                <span class="modal-close" onclick="closeModal('password')">&times;</span>
            </div>
            <form action="<?= base_url('/settings/update') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="field" value="password">
                <input type="password" name="value" placeholder="New Password" required>
                <div class="modal-footer">
                    <button type="button" class="cancel" onclick="closeModal('password')">Cancel</button>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    


    <script>
        function openModal(field) {
            document.getElementById(`modal-${field}`).classList.add('active');
        }

        function closeModal(field) {
            document.getElementById(`modal-${field}`).classList.remove('active');
        }
    </script>
</body>
</html>
