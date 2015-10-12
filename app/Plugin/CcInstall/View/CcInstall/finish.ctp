<div class="install">
    <h2><?php echo $pageTitle; ?></h2>

    <p>
        Página de Bem-vindo: <?php echo $this->Html->link(Router::url('/', true), Router::url('/', true)); ?><br />
        Username: admin<br />
        Senha: admin
    </p>

    <br />
    <br />

    <p>
        <?php echo __('Exclua o diretório de instalação <strong>/app/Plugin/install</strong>.') ?>
    </p>

    <br />
    <br />

    <?php
        echo $this->Html->link(__('Clique aqui para apagar os arquivos de instalação'), array(
            'plugin' => 'cc_install',
            'controller' => 'cc_install',
            'action' => 'finish',
            'delete' => 1,
        ));
    ?>
</div>
