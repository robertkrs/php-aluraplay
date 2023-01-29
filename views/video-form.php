<?php
require_once __DIR__ . '/inicio-html.php';
?>
    <main class="container">
        <form class="container__formulario"  method="POST">
            <h3 class="formulario__titulo"><?= $id == false ? 'Novo vídeo' : 'Editar video'  ?></h3>
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="url">Link embed</label>
                <input name="url" class="campo__escrita" value="<?= $video?->url; ?>" required
                       placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' />
            </div>


            <div class="formulario__campo">
                <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                <input name="titulo" class="campo__escrita" value="<?= $video?->title; ?>" required placeholder="Neste campo, dê o nome do vídeo"
                       id='titulo' />
            </div>

            <input class="formulario__botao" type="submit" value="Enviar" />
        </form>
    </main>

<?php require_once __DIR__ . '/fim-html.php';