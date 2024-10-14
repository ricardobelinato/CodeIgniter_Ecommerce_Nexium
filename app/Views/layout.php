<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Nexium' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="<?= base_url('images/logo-nexium-2.png') ?>" type="image/x-icon">
    <script src="<?= base_url('js/script.js') ?>" defer></script>
</head>
<body>
    <header>
        <?php require_once "includes/navbar.php";?>
    </header>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        <?php require_once "includes/footer.php";?>
    </footer>
</body>
</html>