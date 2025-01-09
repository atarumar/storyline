<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($article['title']) ?> - StoryLine</title>
    <style>
        /* Keep your original styles here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        body {
            background-color: #fff;
        }

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

        .logo {
            font-weight: bold;
            font-size: 1.5rem;
            text-decoration: none;
            color: #000;
        }

        .profile-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }

        .article {
            max-width: 680px;
            margin: 0 auto;
            padding: 3rem 1rem;
        }

        .article-title {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: black; /* Change this to your desired color */
        }


        .article-meta {
            margin-bottom: 2rem;
            color: #6b6b6b;
        }

        .article-image {
            width: 100%;
            height: auto;
            margin: 2rem 0;
            border-radius: 4px;
        }

        .article-content {
            font-size: 1.25rem;
            line-height: 1.8;
            color: #242424;
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        .actions-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #fff;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .action-button {
            background: none;
            border: none;
            color: #6b6b6b;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="nav">
        <a href="/articles" class="logo">StoryLine</a>
    </nav>

    <article class="article">
        <header>
            <h1 class="article-title"><?= esc($article['title']) ?></h1>
            <div class="article-meta">
                <span> · <?= date('M d, Y', strtotime($article['created_at'])) ?> · </span>
            </div>
        </header>

<img src="<?= esc($article['image_url']) ?>" alt="Article Image" class="article-image">


        <div class="article-content">
            <?= nl2br(esc($article['content'])) ?>
        </div>
    </article>

    <div class="actions-bar">
        <button class="action-button">👏 Clap</button>
        <button class="action-button">💬 Comment</button>
    </div>
</body>
</html>
