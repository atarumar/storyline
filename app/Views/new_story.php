<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Story - StoryLine</title>
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
        .image-url {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 1rem;
        margin-bottom: 1rem;
        background-color: #f9f9f9;
        }

        .image-url::placeholder {
        color: #6b7280;
        font-style: italic;
        }

        .image-url:focus {
        border-color: #1a8917;
        outline: none;
        background-color: #fff;
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
    </style>
</head>
<body>
    <nav class="nav">
        <div class="nav-left">
            <a href="/articles" class="logo">StoryLine</a>
            <span class="draft-status">Draft in <?= session()->get('user_name') ?? 'User' ?></span>
        </div>
        <div class="nav-right">
            <button type="submit" form="story-form" class="publish-btn">Publish</button>
        </div>
    </nav>

    <main class="editor">
        <form id="story-form" action="<?= base_url('/story/save') ?>" method="post">
            <?= csrf_field() ?>
                <input type="hidden" name="story_id" value="<?= isset($story['story_id']) ? esc($story['story_id']) : '' ?>">
                <input type="text" name="image_url" placeholder="Image URL" value="<?= isset($story) ? esc($story['image_url']) : '' ?>">
                <input type="text" name="title" class="title" placeholder="Title" value="<?= isset($story['title']) ? esc($story['title']) : '' ?>" required>
                <textarea name="content" class="content" placeholder="Tell your story..." required><?= isset($story['content']) ? esc($story['content']) : '' ?></textarea>
        </form>
    </main>
</body>
</html>
