<?php

global $wpdb;

if (isset($_POST['action']) && $_POST['action'] == 'addFAQ') {

    $wpdb->insert(

        'wp_faq',

        array('title' => $_POST['novo_title'], 'reply' => $_POST['novo_reply'])

    );

    echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
              <p><strong>FAQ adicionada.</strong></p>
              
              <button type=\"button\" class=\"notice-dismiss\">
                <span class=\"screen-reader-text\">Dispensar este aviso.</span>
              </button>
              
          </div>";

}

if (isset($_POST['action']) && $_POST['action'] == 'editarFAQ') {

    $wpdb->update(

        'wp_faq',

        array('title' => $_POST['title'], 'reply' => $_POST['reply']),
        array ('id' => $_GET['id'])

    );

    echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
              <p><strong>FAQ editada.</strong></p>
              
              <button type=\"button\" class=\"notice-dismiss\">
                <span class=\"screen-reader-text\">Dispensar este aviso.</span>
              </button>
              
          </div>";

}

if (isset($_GET['action']) && $_GET['action'] == 'excluir') {

    $wpdb->delete(

        'wp_faq',
        array ('id' => $_GET['id'])

    );

    echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
              <p><strong>FAQ excluída.</strong></p>
              
              <button type=\"button\" class=\"notice-dismiss\">
                <span class=\"screen-reader-text\">Dispensar este aviso.</span>
              </button>
              
          </div>";

}

$faqs = $wpdb->get_results('SELECT * FROM  wp_faq');

?>

<?php if (isset($_GET['id']) && !isset($_GET['action'])) : ?>

    <h2>Editar FAQ</h2>

    <form method="post">

        <input type="hidden" name="action" value="editarFAQ">

        <table class="form-table">

            <?php foreach ($faqs as $faq) : ?>

                <?php if ($faq->id == $_GET['id']) : ?>

                    <tr>
                        <th scope="row"><label for="title">Título</label></th>
                        <td><input required name="title" type="text" id="title" value="<?php echo $faq->title; ?>" class="regular-text" /></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="resume">Resposta</label></th>
                        <td><textarea style="height: 300px;" required name="reply" id="reply" class="regular-text"><?php echo $faq->reply; ?></textarea></td>
                    </tr>

                <?php endif; ?>

            <?php endforeach; ?>

        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Salvar FAQ">
        </p>

    </form>

<?php else : ?>

    <div class="wrap">

        <h2>FAQ Starvai</h2>

    </div>

    </br>
    </br>

    <table class="wp-list-table widefat fixed striped posts">

        <tbody id="the-list">

        <?php foreach ($faqs as $faq) : ?>

            <tr>

                <td class="title column-title has-row-actions column-primary page-title" data-colname="Título">

                    <strong>
                        <a class="row-title" href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_faq&id=<?php echo $faq->id; ?>"><?php echo $faq->title; ?></a>
                    </strong>

                    <div class="row-actions">
                        <span class='edit'><a href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_faq&id=<?php echo $faq->id; ?>" class="submitedit" aria-label="Editar">Editar</a></span>
                        <span class='trash'><a href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_faq&id=<?php echo $faq->id; ?>&action=excluir" class="submitdelete" aria-label="Excluir">Excluir</a></span>
                    </div>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

    <h2>Adicionar nova</h2>

    <form method="post">

        <input type="hidden" name="action" value="addFAQ">

        <table class="form-table">

            <tr>
                <th scope="row"><label for="title">Título</label></th>
                <td><input required name="novo_title" type="text" id="novo_title" class="regular-text" /></td>
            </tr>

            <tr>
                <th scope="row"><label for="resume">Resposta</label></th>
                <td><textarea style="height: 300px;" required name="novo_reply" id="novo_reply" class="regular-text"></textarea></td>
            </tr>

        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Adicionar FAQ">
        </p>

    </form>

<?php endif; ?>
