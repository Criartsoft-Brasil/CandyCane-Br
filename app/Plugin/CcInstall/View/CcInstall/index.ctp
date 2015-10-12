<div class="install index">
    <?php
        $check = true;
		$cmd = "";

        // pdo extension check
        if (extension_loaded('pdo')) {
            echo '<p class="success">' . __('PDO extensão é carregado.').'</p>';
        } else {
            $check = false;
            echo '<p class="error">' . __('PDO extensão NÃO é carregada.').'</p>';
        }

        // tmp is writable
        if (is_writable(TMP)) {
            echo '<p class="success">' . __('Seu diretório tmp é gravável.') . '('.TMP.')</p>';
        } else {
            $check = false;
            echo '<p class="error">' . __('Seu diretório tmp NÃO é gravável.').'</p>';
			$cmd .= 'chmod -R 777 '.TMP."\n";
        }

        // Config is writable
        if (is_writable(APP.'Config')) {
            echo '<p class="success">' . __('Seu diretório Config é gravável.') . '('.APP.'Config'.')</p>';
        } else {
            $check = false;
            echo '<p class="error">' . __('Seu diretório Config NÃO é gravável.').'</p>';
			$cmd .= 'chmod -R 777 '.APP.'Config'."\n";
        }

        // files is writable
        if (is_writable(APP.'files')) {
            echo '<p class="success">' . __('Seu diretório de arquivos é gravável.') . '('.APP.'files'.')</p>';
        } else {
            $check = false;
            echo '<p class="error">' . __('Seu diretório de arquivos NÃO é gravável.').'</p>';
			$cmd .= 'chmod -R 777 '.APP.'files'."\n";
        }

        // Plugin is writable
        if (is_writable(APP.'Plugin')) {
            echo '<p class="success">' . __('Seu diretório Plugin é gravável.') . '('.APP.'Plugin'.')</p>';
        } else {
            $check = false;
            echo '<p class="error">' . __('Seu diretório plugin NÃO é gravável.').'</p>';
			$cmd .= 'chmod -R 777 '.APP.'Plugin';
        }

        // allow_url_fopen
        $allow_url_fopen = ini_get('allow_url_fopen');
        if ($allow_url_fopen === '1') {
            echo '<p class="success">' . __('Seu allow_url_fopen está funcionando bem.').'</p>';
        } else {
            $check = false;
            echo '<p class="error">' . __('Seu allow_url_fopen NÃO está funcionando bem.').'<br/>';
            echo __('Por favor, ative o allow_url_fopen no php.ini').'<br/>';
            echo __('Ou você não pode instalar o plugin do remoto.').'</p>';
        }

		// routing
        echo '<p class="success" id="routing-success" style="display:none">' . __('Seu roteamento está funcionando bem.').'</p>';
        echo '<p class="error" id="routing-error">' . __('O seu roteamento não está funcionando bem.').'<br/>';
        echo __('Por favor ative o mod_rewrite e .htaccess.').'<br/>';
        echo __('Ou descomente "//Configure::write(\'App.baseUrl\', env(\'SCRIPT_NAME\'));" em app/Config/core.php e remover todos .htaccess.').'</p>';


        // php version
        // if (phpversion() > 5) {
        //     echo '<p class="success">' . sprintf(__('PHP version %s > 5'), phpversion()) . '</p>';
        // } else {
        //     $check = false;
        //     echo '<p class="error">' . sprintf(__('PHP version %s < 5'), phpversion()) . '</p>';
        // }

        if ($check) {
            echo '<p id="next-success" style="display:none">' . $this->Html->link(__('Clique aqui para iniciar a instalação'), array('action' => 'database'), array('id' => 'next-link')) . '</p>';
        } else {
            echo '<p id="next-error">' . __('A instalação não pode continuar como requisitos mínimos não são cumpridos.');
			echo '<textarea cols="60" rows="6">'.$cmd.'</textarea></p>';
        }
    ?>
</div>
<script>
    $(function(){
        // Document is ready
        $.getJSON("<?php echo $route_url;?>", function(json){
            if (json.status =='OK') {
            $('#routing-error').hide();
            $('#routing-success').show();

            <?php if ($check ==true):?>
                $('#next-error').hide();
                $('#next-success').show();
            <?php endif; ?>
            }
        });

    });
</script>
