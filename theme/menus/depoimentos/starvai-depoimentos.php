<?php

global $wpdb;

if (isset($_POST['action']) && $_POST['action'] == 'addDepoimento') {

    $wpdb->insert(

        'wp_depoimentos',

        array('nome' => $_POST['novo_nome'], 'texto' => $_POST['novo_texto'])

    );

    echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
              <p><strong>Depoimento adicionado.</strong></p>
              
              <button type=\"button\" class=\"notice-dismiss\">
                <span class=\"screen-reader-text\">Dispensar este aviso.</span>
              </button>
              
          </div>";

}

if (isset($_POST['action']) && $_POST['action'] == 'editarDepoimento') {

    $wpdb->update(

        'wp_depoimentos',

        array('nome' => $_POST['nome'], 'texto' => $_POST['texto']),
        array ('id' => $_GET['id'])

    );

    echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
              <p><strong>Depoimento editado.</strong></p>
              
              <button type=\"button\" class=\"notice-dismiss\">
                <span class=\"screen-reader-text\">Dispensar este aviso.</span>
              </button>
              
          </div>";

}

if (isset($_GET['action']) && $_GET['action'] == 'excluir') {

    $wpdb->delete(

        'wp_depoimentos',
        array ('id' => $_GET['id'])

    );

    echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
              <p><strong>Depoimento excluído.</strong></p>
              
              <button type=\"button\" class=\"notice-dismiss\">
                <span class=\"screen-reader-text\">Dispensar este aviso.</span>
              </button>
              
          </div>";

}

$depoimentos = $wpdb->get_results('SELECT * FROM  wp_depoimentos');

?>

<?php if (isset($_GET['id']) && !isset($_GET['action'])) : ?>

    <h2>Editar depoimento</h2>

    <form method="post">

        <input type="hidden" name="action" value="editarDepoimento">

        <table class="form-table">

            <?php foreach ($depoimentos as $depoimento) : ?>

                <?php if ($depoimento->id == $_GET['id']) : ?>

                    <tr>
                        <th scope="row"><label for="title">Nome</label></th>
                        <td><input required name="nome" type="text" id="nome" value="<?php echo $depoimento->nome; ?>" class="regular-text" /></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="resume">Texto</label></th>
                        <td><textarea style="height: 300px;" required name="texto" id="texto" class="regular-text"><?php echo $depoimento->texto; ?></textarea></td>
                    </tr>

                <?php endif; ?>

            <?php endforeach; ?>

        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Salvar depoimento">
        </p>

    </form>

<?php else : ?>

    <div class="wrap">

        <h2>Depoimentos Starvai</h2>

    </div>

    </br>
    </br>

    <table class="wp-list-table widefat fixed striped posts">

        <tbody id="the-list">

        <?php foreach ($depoimentos as $depoimento) : ?>

            <tr>

                <td class="title column-title has-row-actions column-primary page-title" data-colname="Título">

                    <strong>
                        <a class="row-title" href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_depoimentos&id=<?php echo $depoimento->id; ?>"><?php echo $depoimento->nome; ?></a>
                    </strong>

                    <div class="row-actions">
                        <span class='edit'><a href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_depoimentos&id=<?php echo $depoimento->id; ?>" class="submitedit" aria-label="Editar">Editar</a></span>
                        <span class='trash'><a href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_depoimentos&id=<?php echo $depoimento->id; ?>&action=excluir" class="submitdelete" aria-label="Excluir">Excluir</a></span>
                    </div>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

    <h2>Adicionar novo</h2>

    <form method="post">

        <input type="hidden" name="action" value="addDepoimento">

        <table class="form-table">

            <tr>
                <th scope="row"><label for="title">Nome</label></th>
                <td><input required name="novo_nome" type="text" id="novo_nome" class="regular-text" /></td>
            </tr>

            <tr>
                <th scope="row"><label for="resume">Texto</label></th>
                <td><textarea style="height: 300px;" required name="novo_texto" id="novo_texto" class="regular-text"></textarea></td>
            </tr>

        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Adicionar depoimento">
        </p>

    </form>

<?php endif; ?>
