<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Story - Medium</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        body {
            background-color: #fff;
        }

        /* Navigation */
        .nav {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo {
            font-weight: bold;
            font-size: 1.5rem;
            text-decoration: none;
            color: #000;
        }

        .draft-status {
            color: #6b6b6b;
            font-size: 0.9rem;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .publish-btn {
            background: #1a8917;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .profile-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Editor */
        .editor {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .title {
            font-size: 2.5rem;
            font-weight: normal;
            border: none;
            outline: none;
            width: 100%;
            margin-bottom: 1rem;
            color: #6b6b6b;
        }

        .title::placeholder {
            color: #6b6b6b;
        }

        .content {
            font-size: 1.25rem;
            line-height: 1.6;
            border: none;
            outline: none;
            width: 100%;
            min-height: 70vh;
            resize: none;
            color: #6b6b6b;
        }

        .content::placeholder {
            color: #6b6b6b;
        }

        .add-content {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1px solid #6b6b6b;
            color: #6b6b6b;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.5rem;
            margin: 1rem 0;
        }
    </style>
</head>
<body>
    <nav class="nav">
        <div class="nav-left">
            <a href="/" class="logo">Medium</a>
            <span class="draft-status">Draft in Athharumar</span>
        </div>
        <div class="nav-right">
            <button class="publish-btn">Publish</button>
            <img src="/placeholder.svg" alt="Profile" class="profile-avatar">
        </div>
    </nav>

    <main class="editor">
        <form action="<?= base_url('/story/save') ?>" method="post">
            <?= csrf_field() ?>
            <input type="text" name="title" class="title" placeholder="Title">
            <button type="submit" class="publish-btn">Publish</button>
            <textarea name="content" class="content" placeholder="Tell your story..."></textarea>
        </form>

    </main>
</body>
</html>