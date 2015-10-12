<div class="install form">
    <h2><?php echo $pageTitle; ?></h2>
    <p><?php echo __('Criando configuração de conexão de banco de dados. por favor, escreva configuração válido para o servidor de banco de dados.') ?></p>
    <?php
        echo $this->Form->create('Install', array('url' => array('plugin' => 'cc_install', 'controller' => 'cc_install', 'action' => 'database')));
        echo $this->Form->input('Install.datasource', array('type' => 'select', 'label' => 'Driver', 'options' => array('mysql' => 'MySQL', 'postgres'=>'PostgreSQL')));
        echo $this->Form->input('Install.host', array('label' => 'Host', 'value' => 'localhost'));
        echo $this->Form->input('Install.login', array('label' => 'User / Login', 'value' => 'root'));
        echo $this->Form->input('Install.password', array('label' => 'Password'));
        echo $this->Form->input('Install.database', array('label' => __('Nome do banco de dados existente'), 'value' => 'candycane-br'));
        echo $this->Form->input('Install.prefix', array('label' => __('Prefixo para nome de tabela. (Apenas para o mysql, se você precisar)'), 'value' => ''));
        echo $this->Form->submit(__('Criar banco de dados'),array('id' => 'database-submit'));
        echo $this->Form->end();
    ?>
</div>
