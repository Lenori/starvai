<?php

global $wpdb;

$id = $_GET['id'];

if (isset($_POST['action'])) {

    if ($_POST['action'] == 'editarSlide') {

        if (isset($_FILES['slide-img'])) {

            if (!function_exists('wp_handle_upload') ) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
            }

            $uploadedfile = $_FILES['slide-img'];
            $upload_overrides = array( 'test_form' => false );

            $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

            if ($movefile && !isset($movefile['error'])) {

                $wpdb->update(

                    'wp_slider',
                    array('img' => $movefile['url']),
                    array ('id' => $_GET['id'])

                );

            }

        }

        $wpdb->update(

            'wp_slider',

            array(

                'title' => $_POST['title'],
                'text' => $_POST['text']

            ),

            array (

                'id' => $_GET['id']

            )

        );

        echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
                  <p><strong>Slide editado.</strong></p>
                  
                      <button type=\"button\" class=\"notice-dismiss\">
                        <span class=\"screen-reader-text\">Dispensar este aviso.</span>
                      </button>
                      
                  </div>";

    }

    if ($_POST['action'] == 'adicionarSlide') {

        if (isset($_FILES['slide-img'])) {

            if (!function_exists('wp_handle_upload') ) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
            }

            $uploadedfile = $_FILES['slide-img'];
            $upload_overrides = array( 'test_form' => false );

            $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

            if ($movefile && !isset($movefile['error'])) {

                $wpdb->insert(

                    'wp_slider',
                    array(
                        'img' => $movefile['url'],
                        'title' => $_POST['title'],
                        'text' => $_POST['text']
                    )
                );

            }

        }

        echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
                  <p><strong>Slide adicionado.</strong></p>
                  
                      <button type=\"button\" class=\"notice-dismiss\">
                        <span class=\"screen-reader-text\">Dispensar este aviso.</span>
                      </button>
                      
                  </div>";

    }

}

if ($_GET['action'] && $_GET['action'] == 'excluir') {

    $wpdb->update(

        'wp_slider',
        array ('id' => $_GET['id'])

    );

    echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
                  <p><strong>Slide excluído.</strong></p>
                  
                      <button type=\"button\" class=\"notice-dismiss\">
                        <span class=\"screen-reader-text\">Dispensar este aviso.</span>
                      </button>
                      
                  </div>";

}

$slides = $wpdb->get_results('SELECT * FROM  wp_slider');

?>

<?php if (isset($_GET['id'])) : ?>

    <h2>Editar slide</h2>

    <form method="post" enctype="multipart/form-data">

        <input type="hidden" name="action" value="editarSlide">

        <table class="form-table">

            <?php foreach ($slides as $key => $data) : ?>

                <?php if ($data->id == $_GET['id']) : ?>

                    <tr>
                        <th scope="row"><label for="projeto-img">Imagem atual do slide</label></th>
                        <td><img src="<?php echo $data->img; ?>" alt="project-img" />
                            <p class="description">Imagem do slide na homepage</p></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="slide-img">Nova imagem</label></th>
                        <td><input name="slide-img" type="file" id="slide-img" class="regular-text" /></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="title">Título</label></th>
                        <td><input required name="title" type="text" id="title" value="<?php echo $data->title; ?>" class="regular-text" />
                    </tr>

                    <tr>
                        <th scope="row"><label for="text">Texto</label></th>
                        <td><textarea style="height: 300px;" required name="text" id="text" class="regular-text"><?php echo $data->text; ?></textarea>
                    </tr>

                <?php endif; ?>

            <?php endforeach; ?>

        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Salvar slide">
        </p>

    </form>

<?php else : ?>

    <div class="wrap">

        <h2>Slides Starvai</h2>

    </div>

    </br>
    </br>

    <table class="wp-list-table widefat fixed striped posts">

        <tbody id="the-list">

        <?php foreach ($slides as $key => $data) : ?>

            <tr>

                <td class="title column-title has-row-actions column-primary page-title" data-colname="Título">

                    <strong>
                        <a class="row-title" href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_slider&id=<?php echo $data->id; ?>"><?php echo $data->title; ?></a>
                    </strong>

                    <div class="row-actions">
                        <span class='edit'><a href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_slider&id=<?php echo $data->id; ?>" class="submitedit" aria-label="Editar">Editar</a></span>
                        <span class='trash'><a href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_slider&id=<?php echo $data->id; ?>&action=excluir" class="submitdelete" aria-label="Excluir">Excluir</a></span>
                    </div>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

    <h2>Adicionar slide</h2>

    <form method="post" enctype="multipart/form-data">

        <input type="hidden" name="action" value="adicionarSlide">

        <table class="form-table">

            <tr>
                <th scope="row"><label for="slide-img">Iagem</label></th>
                <td><input name="slide-img" type="file" id="slide-img" class="regular-text" /></td>
            </tr>

            <tr>
                <th scope="row"><label for="title">Título</label></th>
                <td><input required name="title" type="text" id="title" class="regular-text" />
            </tr>

            <tr>
                <th scope="row"><label for="text">Texto</label></th>
                <td><textarea style="height: 300px;" required name="text" id="text" class="regular-text"></textarea>
            </tr>

        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Adicionar slide">
        </p>

    </form>

<?php endif; ?>
