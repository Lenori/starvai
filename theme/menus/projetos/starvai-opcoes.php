<?php

global $wpdb;

if (isset($_POST['action']) && $_POST['action'] == 'editarOpcoes') {

    $opcoes = $wpdb->get_results('SELECT * FROM  wp_projetos_opcoes');

    foreach ($opcoes as $opcao) {

        if ($_POST[''. $opcao->id .''] == '') {

            $wpdb->delete(

                'wp_projetos_opcoes',
                array('id' => $opcao->id)

            );

        }

        else {

            $wpdb->update(

                'wp_projetos_opcoes',

                array('title' => $_POST[''. $opcao->id .'']),
                array ('id' => $opcao->id)

            );

        }

    }

    echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
              <p><strong>Opções atualizadas.</strong></p>
              
              <button type=\"button\" class=\"notice-dismiss\">
                <span class=\"screen-reader-text\">Dispensar este aviso.</span>
              </button>
              
          </div>";

}

if (isset($_POST['action']) && $_POST['action'] == 'addOpcoes') {

    $wpdb->insert(

        'wp_projetos_opcoes',
        array('title' => $_POST['nova_opcao'])

    );

    echo "<div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\">
    
              <p><strong>Opção adicionada.</strong></p>
              
              <button type=\"button\" class=\"notice-dismiss\">
                <span class=\"screen-reader-text\">Dispensar este aviso.</span>
              </button>
              
          </div>";

}

$opcoes = $wpdb->get_results('SELECT * FROM  wp_projetos_opcoes');

?>

    <h2>Editar opcões disponíveis nos projetos</h2>

    <form method="post">

        <input type="hidden" name="action" value="editarOpcoes">

        <table class="form-table">

            <?php foreach ($opcoes as $opcao) : ?>

                <tr>
                    <td><input name="<?php echo $opcao->id; ?>" type="text" id="<?php echo $opcao->id; ?>" value="<?php echo $opcao->title; ?>" class="regular-text" />
                </tr>

            <?php endforeach; ?>

            <tr>
                <td><p class="description">Para excluir uma opção, basta deixá-la em branco.</p></td>
            </tr>

        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Salvar opções">
        </p>

    </form>

    <h2>Adicionar nova</h2>

    <form method="post">

        <input type="hidden" name="action" value="addOpcoes">

        <table class="form-table">

            <tr>
                <td><input required name="nova_opcao" type="text" id="nova_opcao" class="regular-text" />
            </tr>

        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Adicionar opção">
        </p>

    </form>
