<div class="install">
    <h2><?php echo $pageTitle; ?></h2>
    <p><?php echo __('Carregando dados iniciais ao banco de dados que você configurou.')?></p>
    <?php
        echo $this->Html->link(__('Clique aqui para construir seu banco de dados'), array(
            'plugin' => 'cc_install',
            'controller' => 'cc_install',
            'action' => 'data',
            'run' => 1,
        ),array(
             'id' => 'run-link'
            ));
    ?>
</div>
