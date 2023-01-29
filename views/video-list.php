<?= require_once __DIR__ . '/inicio-html.php';
?>
<ul class="videos__container" alt="videos alura">
    <?php foreach ($videoList as $videos): ?>
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?= $videos->url; ?>"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

            <div class="descricao-video">
                <img src="/img/logo.png" alt="logo canal alura">
                <h3><?= $videos->title; ?></h3>
                <div class="acoes-video">
                    <a href="/editar-video?id=<?= $videos->id; ?>">Editar</a>
                    <a href="/remover-video?id=<?= $videos->id; ?>">Excluir</a>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

<?php require_once __DIR__ . '/fim-html.php';