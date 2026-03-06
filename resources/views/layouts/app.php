<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'FileForge'); ?></title>
    <meta name="description" content="<?= htmlspecialchars($description ?? 'Convert files online securely and quickly.'); ?>">
    <link rel="stylesheet" href="/assets/css/app.css">
    <?php if (isset($schema)): ?><script type="application/ld+json"><?= $schema; ?></script><?php endif; ?>
</head>
<body>
<header class="container nav">
    <a href="/" class="brand">FileForge</a>
    <nav>
        <a href="/pricing">Pricing</a>
        <a href="/contact">Contact</a>
        <a href="/dashboard">Dashboard</a>
        <button id="themeToggle">Theme</button>
    </nav>
</header>
<main class="container"><?= $content ?? ''; ?></main>
<script src="/assets/js/app.js" defer></script>
</body>
</html>
