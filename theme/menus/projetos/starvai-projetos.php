<?php

global $wpdb;

$id = $_GET['id'];

if (isset($_POST['action'])) {

    if ($_POST['action'] == 'editarProjeto') {

        if (isset($_FILES['projeto-img'])) {

            if (!function_exists('wp_handle_upload') ) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
            }

            $uploadedfile = $_FILES['projeto-img'];
            $upload_overrides = array( 'test_form' => false );

            $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

            if ($movefile && !isset($movefile['error'])) {

                $wpdb->update(

                    'wp_projetos',
                    array('img' => $movefile['url']),
                    array ('id' => $_GET['id'])

                );

            }

        }

        if (isset($_FILES['bullet-1-img'])) {

            if (!function_exists('wp_handle_upload') ) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
            }

            $uploadedfile = $_FILES['bullet-1-img'];
            $upload_overrides = array( 'test_form' => false );

            $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

            if ($movefile && !isset($movefile['error'])) {

                $wpdb->update(

                    'wp_projetos',
                    array('bullet_1_img' => $movefile['url']),
                    array ('id' => $_GET['id'])

                );

            } else {
                echo $movefile['error'];
            }

        }

        if (isset($_FILES['bullet-2-img'])) {

            if (!function_exists('wp_handle_upload') ) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
            }

            $uploadedfile = $_FILES['bullet-2-img'];
            $upload_overrides = array( 'test_form' => false );

            $movefile = wp_handle_upload($uploadedfile, $upload_overrides);

            if ($movefile && !isset($movefile['error'])) {

                $wpdb->update(

                    'wp_projetos',
                    array('bullet_2_img' => $movefile['url']),
                    array ('id' => $_GET['id'])

                );

            }

        }

        $wpdb->update(

            'wp_projetos',

            array(

                'title' => $_POST['title'],
                'slug' => mb_strtolower(str_replace(' ', '-', $_POST['slug'])),
                'resume' => $_POST['resume'],
                'bullet_1_titulo' => $_POST['bullet-1-titulo'],
                'bullet_1_text' => $_POST['bullet-1-texto'],
                'bullet_2_titulo' => $_POST['bullet-2-titulo'],
                'bullet_2_text' => $_POST['bullet-2-texto']

            ),

            array (

                'id' => $_GET['id']

            )

        );

        $wpdb->delete('wp_opcoes_selecionadas', array ('projeto' => $_GET['id']));

        foreach ($_POST['opcoes'] as $check) {

            $wpdb->insert(

                'wp_opcoes_selecionadas',

                array(

                    'projeto' => $_GET['id'],
                    'opcao' => $check

                )

            );

        }

        echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
                  <p><strong>Projeto editado.</strong></p>
                  
                      <button type=\"button\" class=\"notice-dismiss\">
                        <span class=\"screen-reader-text\">Dispensar este aviso.</span>
                      </button>
                      
                  </div>";

    }

}

$projetos = $wpdb->get_results('SELECT * FROM  wp_projetos');
$opcoes = $wpdb->get_results('SELECT * FROM  wp_projetos_opcoes');
$selecionadosDB = $wpdb->get_results("SELECT opcao FROM  wp_opcoes_selecionadas WHERE projeto = '$id'");

$selecionados = [];

foreach ($selecionadosDB as $selected)
    $selecionados[] = $selected->opcao;

?>

<?php if (isset($_GET['id'])) : ?>

    <h2>Editar projeto</h2>

        <form method="post" enctype="multipart/form-data">

            <input type="hidden" name="action" value="editarProjeto">

            <table class="form-table">

                <?php foreach ($projetos as $key => $data) : ?>

                    <?php if ($data->id == $_GET['id']) : ?>

                        <tr>
                            <th scope="row"><label for="projeto-img">Imagem atual do projeto</label></th>
                            <td><img src="<?php echo $data->img; ?>" alt="project-img" />
                            <p class="description">Imagem do projeto na homepage</p></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="projeto-img">Nova imagem</label></th>
                            <td><input name="projeto-img" type="file" id="projeto-img" class="regular-text" /></td>
                        </tr>

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

                        <tr>
                            <th><h2>Bullet item 01</h2></th>
                        </tr>

                        <tr>
                            <th scope="row"><label for="bullet-img">Imagem do bullet</label></th>
                            <td><img style="width: 100px" src="<?php echo $data->bullet_1_img; ?>" alt="bullet-img" />
                            <p class="description">Imagem do Bullet 01 no projeto</p></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="bullet-1-img">Nova imagem</label></th>
                            <td><input name="bullet-1-img" type="file" id="bullet-1-img" class="regular-text" /></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="bullet-1-titulo">Título</label></th>
                            <td><input required name="bullet-1-titulo" type="text" id="bullet-1-titulo" value="<?php echo $data->bullet_1_titulo; ?>" class="regular-text" />
                            <p class="description">Título do Bullet 01 no projeto</p></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="bullet-1-texto">Texto</label></th>
                            <td><input required name="bullet-1-texto" type="text" id="bullet-1-texto" value="<?php echo $data->bullet_1_text; ?>" class="regular-text" />
                            <p class="description">Texto do Bullet 01 no projeto</p></td>
                        </tr>

                        <tr>
                            <th><h2>Bullet item 02</h2></th>
                        </tr>

                        <tr>
                            <th scope="row"><label for="bullet-img">Imagem do bullet</label></th>
                            <td><img style="width: 100px" src="<?php echo $data->bullet_2_img; ?>" alt="bullet-img" />
                                <p class="description">Imagem do Bullet 02 no projeto</p></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="bullet-2-img">Nova imagem</label></th>
                            <td><input name="bullet-2-img" type="file" id="bullet-2-img" class="regular-text" /></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="bullet-2-titulo">Título</label></th>
                            <td><input required name="bullet-2-titulo" type="text" id="bullet-2-titulo" value="<?php echo $data->bullet_2_titulo; ?>" class="regular-text" />
                                <p class="description">Título do Bullet 02 no projeto</p></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="bullet-2-texto">Texto</label></th>
                            <td><input required name="bullet-2-texto" type="text" id="bullet-1-texto" value="<?php echo $data->bullet_2_text; ?>" class="regular-text" />
                                <p class="description">Texto do Bullet 02 no projeto</p></td>
                        </tr>

                        <tr>
                            <th><h2>O seu projeto pode conter:</h2></th>
                        </tr>

                        <?php foreach ($opcoes as $opcao) : ?>

                            <tr>
                                <td style="width: 300px;">
                                    <label for="opcao-<? echo $opcao->id ?>">
                                    <input name="opcoes[]" type="checkbox" id="opcao-<? echo $opcao->id ?>" value="<?php echo $opcao->id ?>" <?php echo in_array($opcao->id, $selecionados) ? 'checked' : '' ?>>
                                        <?php echo $opcao->title ?>
                                    </label>
                                    <br>
                                </td>
                            </tr>

                        <?php endforeach; ?>

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
