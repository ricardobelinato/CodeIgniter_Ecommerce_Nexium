<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Nexium' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="<?= base_url('images/logo-nexium-2.png') ?>" type="image/x-icon">
    <script src="<?= base_url('js/script.js') ?>" defer></script>
    <link rel="stylesheet" href="https://social-icons-plugin.netlify.app/dist/social-icons.min.css">
    <script src="https://social-icons-plugin.netlify.app/dist/social-icons.min.js?whatsapp=https://wa.me/5532998495079&size=40" defer></script>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-gray-100">
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