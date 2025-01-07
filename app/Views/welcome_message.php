<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medium – Where good ideas find you.</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        body {
            background-color: #faf9f6;
        }

        /* Navigation */
        .nav {
            padding: 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #000;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link {
            color: #000;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .get-started {
            background-color: #000;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 1.5rem;
            text-decoration: none;
            font-size: 0.9rem;
        }

        /* Hero Section */
        .hero {
            display: flex;
            justify-content: space-between;
            padding: 6rem 1.25rem;
            max-width: 1400px;
            margin: 0 auto;
            min-height: calc(100vh - 75px);
        }

        .hero-content {
            max-width: 600px;
            padding-top: 3rem;
        }

        .hero-title {
            font-size: 5.5rem;
            line-height: 1.1;
            letter-spacing: -0.05em;
            margin-bottom: 1.5rem;
            color: #242424;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: #6B6B6B;
            margin-bottom: 3rem;
        }

        .start-reading {
            background-color: #000;
            color: #fff;
            padding: 0.75rem 2rem;
            border-radius: 1.5rem;
            text-decoration: none;
            font-size: 1rem;
            display: inline-block;
        }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .decorative-image {
            width: 100%;
            max-width: 500px;
            height: auto;
        }

        /* Footer */
        .footer {
            padding: 2rem 1.25rem;
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .footer-link {
            color: #6B6B6B;
            text-decoration: none;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-title {
                font-size: 4rem;
            }
        }

        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                padding: 3rem 1.25rem;
            }

            .hero-content {
                padding-top: 0;
                text-align: center;
            }

            .hero-title {
                font-size: 3rem;
            }

            .hero-subtitle {
                font-size: 1.25rem;
            }

            .nav-links .nav-link:not(:last-child) {
                display: none;
            }
        }
    </style>
</head>
<body>
    <nav class="nav">
        <a href="<?= base_url() ?>" class="logo">Medium</a>
        <div class="nav-links">
            <a href="<?= base_url('our-story') ?>" class="nav-link">Our story</a>
            <a href="<?= base_url('membership') ?>" class="nav-link">Membership</a>
            <a href="<?= base_url('write') ?>" class="nav-link">Write</a>
            <a href="<?= base_url('signin') ?>" class="nav-link">Sign in</a>
            <a href="<?= base_url('get-started') ?>" class="get-started">Get started</a>
        </div>
    </nav>

    <main class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Human stories & ideas</h1>
            <p class="hero-subtitle">A place to read, write, and deepen your understanding</p>
            <a href="<?= base_url('start-reading') ?>" class="start-reading">Start reading</a>
        </div>
        <div class="hero-image">
    <img src="https://media.istockphoto.com/id/1461537129/photo/close-up-woman-hand-writing-on-notebook.jpg?s=612x612&w=0&k=20&c=1UPcoOpmYSCzeHAyOB92X4tgSIybR6p7m-yUqIjAlaA=" 
         alt="Close-up of woman writing in notebook" 
         class="decorative-image" 
         aria-hidden="true">
</div>
    </main>

    <footer class="footer">
        <a href="<?= base_url('help') ?>" class="footer-link">Help</a>
        <a href="<?= base_url('status') ?>" class="footer-link">Status</a>
        <a href="<?= base_url('about') ?>" class="footer-link">About</a>
        <a href="<?= base_url('careers') ?>" class="footer-link">Careers</a>
        <a href="<?= base_url('blog') ?>" class="footer-link">Blog</a>
        <a href="<?= base_url('privacy') ?>" class="footer-link">Privacy</a>
        <a href="<?= base_url('terms') ?>" class="footer-link">Terms</a>
        <a href="<?= base_url('text-to-speech') ?>" class="footer-link">Text to speech</a>
        <a href="<?= base_url('teams') ?>" class="footer-link">Teams</a>
    </footer>
</body>
</html>
