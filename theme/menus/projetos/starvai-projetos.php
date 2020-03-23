<?php

global $wpdb;

if (isset($_POST['action'])) {

    if ($_POST['action'] == 'editarProjeto') {

        $wpdb->update(

            'wp_projetos',

            array(

                'title' => $_POST['title'],
                'slug' => mb_strtolower(str_replace(' ', '-', $_POST['slug'])),
                'resume' => $_POST['resume']

            ),

            array (

                'id' => $_GET['id']

            )

        );

        echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
                  <p><strong>Projeto editado.</strong></p>
                  
                      <button type=\"button\" class=\"notice-dismiss\">
                        <span class=\"screen-reader-text\">Dispensar este aviso.</span>
                      </button>
                      
                  </div>";

    }

}

$projetos = $wpdb->get_results('SELECT * FROM  wp_projetos');

?>

<?php if (isset($_GET['id'])) : ?>

    <h2>Editar projeto</h2>

        <form method="post">

            <input type="hidden" name="action" value="editarProjeto">
            <input type="hidden" name="action" value="editarProjeto">

            <table class="form-table">

                <?php foreach ($projetos as $key => $data) : ?>

                    <?php if ($data->id == $_GET['id']) : ?>

                        <tr>
                            <th scope="row"><label for="title">Título</label></th>
                            <td><input required name="title" type="text" id="title" value="<?php echo $data->title; ?>" class="regular-text" />
                            <p class="description">Ex: Cleverhome, Funflat, Safehouse...</p></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="slug">Slug</label></th>
                            <td><input required name="slug" type="text" id="slug" value="<?php echo $data->slug; ?>" class="regular-text" />
                            <p class="description">URL visível do projeto</p></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="resume">Descrição</label></th>
                            <td><textarea style="height: 300px;" required name="resume" id="resume" class="regular-text"><?php echo $data->resume; ?></textarea>
                            <p class="description">Em poucas palavras, explique um pouco sobre este projeto.</p></td>
                        </tr>

                    <?php endif; ?>

                <?php endforeach; ?>

            </table>

            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Salvar projeto">
            </p>

        </form>

<?php else : ?>

    <div class="wrap">

        <h2>Projetos Starvai</h2>

    </div>

    </br>
    </br>

    <table class="wp-list-table widefat fixed striped posts">

        <tbody id="the-list">

            <?php foreach ($projetos as $key => $data) : ?>

                <tr>

                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Título">

                        <strong>
                            <a class="row-title" href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_projetos&id=<?php echo $data->id; ?>">Projeto <?php echo $data->title; ?></a>
                        </strong>

                        <div class="row-actions">
                            <span class='edit'><a href="<?php echo get_bloginfo('wpurl') ?>/wp-admin/admin.php?page=starvai_projetos&id=<?php echo $data->id; ?>" class="submitedit" aria-label="Editar">Editar</a></span>
                        </div>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

<?php endif; ?>
