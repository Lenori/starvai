<?php

global $wpdb;

if (isset($_POST['action']) && $_POST['action'] == 'editarEtapas') {

    $wpdb->update(

        'wp_etapas',

        array('title' => $_POST['title'], 'text' => $_POST['text']),
        array ('id' => $_GET['id'])

    );

    echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
              <p><strong>Etapa editada.</strong></p>
              
              <button type=\"button\" class=\"notice-dismiss\">
                <span class=\"screen-reader-text\">Dispensar este aviso.</span>
              </button>
              
          </div>";

}

$etapas = $wpdb->get_results('SELECT * FROM  wp_etapas');

?>

<?php if (isset($_GET['id']) && !isset($_GET['action'])) : ?>

    <h2>Editar Etapa</h2>

    <form method="post">

        <input type="hidden" name="action" value="editarEtapas">

        <table class="form-table">

            <?php foreach ($etapas as $etapa) : ?>

                <?php if ($etapa->id == $_GET['id']) : ?>

                    <tr>
                        <th scope="row"><label for="title">Título</label></th>
                        <td><input required name="title" type="text" id="title" value="<?php echo $etapa->title; ?>" class="regular-text" /></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="resume">Texto</label></th>
                        <td><textarea style="height: 300px;" required name="text" id="text" class="regular-text"><?php echo $etapa->text; ?></textarea></td>
                    </tr>

                <?php endif; ?>

            <?php endforeach; ?>

        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Salvar Etapa">
        </p>

    </form>

<?php else : ?>

    <div class="wrap">

        <h2>Etapas Starvai</h2>

    </div>

    </br>
    </br>

    <table class="wp-list-table widefat fixed striped posts">

        <tbody id="the-list">

        <?php foreach ($etapas as $etapa) : ?>

            <tr>

                <td class="title column-title has-row-actions column-primary page-title" data-colname="Título">

                    <strong>
                        <a class="row-title" href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_etapas&id=<?php echo $etapa->id; ?>"><?php echo $etapa->title; ?></a>
                    </strong>

                    <div class="row-actions">
                        <span class='edit'><a href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_etapas&id=<?php echo $etapa->id; ?>" class="submitedit" aria-label="Editar">Editar</a></span>
                    </div>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

<?php endif; ?>
