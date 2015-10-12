# CandyCane-Br #

CandyCane é um sistema de Gerenciamento de Projeto. A implementação original sobre o qual se baseia, é [Redmine](http://www.redmine.org)

Você pode ver uma demonstração ao vivo de CandyCane, bem como o acompanhamento de bugs para CandyCane aqui: [http://my.candycane.jp/](http://my.candycane.jp/)

* Integração Contínua está sendo executado em aqui: [https://travis-ci.org/yandod/candycane](https://travis-ci.org/yandod/candycane)
[![Build Status](https://travis-ci.org/yandod/candycane.png?branch=master)](https://travis-ci.org/yandod/candycane)
* Relatório de cobertura é gerada pelo Coverall [![Coverage Status](https://coveralls.io/repos/yandod/candycane/badge.png?branch=master)](https://coveralls.io/r/yandod/candycane)
* versioneye [![Dependency Status](https://www.versioneye.com/user/projects/51f0855e632bac469f03892f/badge.png)](https://www.versioneye.com/user/projects/51f0855e632bac469f03892f)

## Instalação ##

1. Extraia todos os arquivos, e coloque em um diretório que seja acessível ao servidor web, e capaz de executar o PHP.
2. Configuração permissões corretas em arquivos e pastas:
	* `chmod -R 777 app/Config`
	* `chmod -R 777 app/files`
	* `chmod -R 777 app/tmp`
	* `chmod -R 777 app/Plugin`
3. Acesse o site através do seu servidor web. Se você instalou em um subdiretório, em seguida, garantir que diretório está na sua URL: http://mysite.com/candycane
4. O instalador passo-a-passo aparece.
5. Basta usá-lo!

## Configuração de Desenvolvimento ##

1. Install Vagrant and VirtualBox.
2. Install vagrant-berkshelf plugin.
	`vagrant plugin install vagrant-berkshelf`
3. Download candycane box
	`vagrant box add candycane {url}`
4. basta digitar `vagrant up`
5. ssh into vm
	`vagrant ssh`
6. cd to app
	`cd /vagrant_data/app`
7. run test
	`./Console/cake test app All`
8. run selenium test

```
vagrant ssh
cd /vagrant_data/
/usr/bin/Xvfb :1 -screen 0 1024x768x8 > /tmp/xvfb.log 2> /tmp/xvfb.error &
export DISPLAY=:1.0
java -jar /var/chef/cache/selenium-server-standalone-2.39.0.jar > /tmp/selenium.log 2> /tmp/selenium.error &
mysql -u root -e "drop database if exists test_candycane;create database test_candycane;"
./vendor/bin/phpunit app/Test/Case/Selenium/InstallerTest.php
```

## Atualizando a versão mais recente ##

Você precisa copiar esses arquivos e diretórios em códigos mais recentes extraídas.
Atualmente não fazer a mudança de esquema de banco de dados.

- app/Config/database.php
- app/files
- app/Plugin


## Notas ##

Atualmente algumas características que estão presentes no Redmine não são suportados pelo CandyCane. Esses são:

- Repository viewer
- Forum
- Documents

CandyCane utiliza CakePHP v2.3.


## Contribuintes

- yandod
- halt
- Ignacio Albors
- k-kishida
- [Graham Weldon](http://grahamweldon.com) (predominant)
- akiyan
- Takuya Sato
- Yoshio HANAWA
- kaz29
- Dima
- Norio Suzuki
- hamaco
- kiang
- okonomi
- shin1x1
- Steve Grosbois
- Spenser Jones
- tomo
- hiromi2424
- Mindiell
- mzdakr
- Òscar Casajuana
- elboletaire
- Michito Suzuki
- Shogo Kawahara
- Sebastien pencreach
- Sardorbek Pulatov
- Hisateru Tanaka
- [Jose Gonzalez](http://josediazgonzalez.com) (savant)

Vamos apreciar todos os pedidos de tração.

Eu tento mesclar, tanto quanto possível. Por favor, fork do repositório se você encontrar algo que você quer corrigir, e enviar uma solicitação de recebimento.
