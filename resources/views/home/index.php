<?php ob_start(); ?>
<section class="hero">
    <h1>Professional File Conversion SaaS</h1>
    <p>CloudConvert-style platform for documents, images, video, audio, archives, and eBooks.</p>
    <div class="dropzone" id="dropzone">Drag and drop files here or click to upload</div>
</section>
<section>
    <h2>Supported conversions</h2>
    <?php foreach ($pairs as $from => $targets): ?>
        <p><strong><?= strtoupper($from); ?></strong> → <?= strtoupper(implode(', ', $targets)); ?></p>
    <?php endforeach; ?>
</section>
<?php $content = ob_get_clean(); $title = 'FileForge - Multi-format converter'; include __DIR__ . '/../layouts/app.php'; ?>
