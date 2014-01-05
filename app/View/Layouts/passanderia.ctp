<?php
$cakeDescription = __d('passanderia', 'Passanderia PassExpress');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        
        echo $this->Html->css('passanderia');
        //echo $this->Html->css('jquery-ui-1.10.3.custom.min');
        echo $this->Html->css('/app/webroot/edge/bootstrap/css/bootstrap');
        echo $this->Html->css('/app/webroot/edge/stylesheets/locastyle');
        echo $this->fetch('css');
        
        echo $this->Html->script('jquery-1.10.2.min');
        echo $this->Html->script('jquery-ui-1.10.3.custom.min');
        ?>
    </head>
    <body>
        <header id="header" class="colorBlue">
            <div class="limit">
                <h1 class="serviceName"><a href="/">Passanderia PassExpress</a></h1>
            </div>
            <menu id="menuPrincipal">
                <ul>
                    <li<?= (strtolower($this->name) == 'servicos' && strtolower($this->action) == 'home') ? ' class="selected"' : ''; ?>>
                        <?= $this->Html->link('', array('controller' => 'servicos', 'action' => 'home'), array('class' => 'ico-home btn')); ?>
                    </li>
                    <li<?= (strtolower($this->name) == 'clientes') ? ' class="selected"' : ''; ?>>
                        <?= $this->Html->link('Clientes', array('controller' => 'clientes', 'action' => 'index'), array('class' => 'ico-users-1 btn')); ?>
                    </li>
                    <li<?= (strtolower($this->name) == 'servicos' && strtolower($this->action) != 'home') ? ' class="selected"' : ''; ?>>
                        <?= $this->Html->link('Serviços', array('controller' => 'servicos', 'action' => 'index'), array('class' => 'ico-money btn')); ?>
                    </li>
                    <li<?= (strtolower($this->name) == 'relatorios') ? ' class="selected"' : ''; ?>>
                        <?= $this->Html->link('Relatórios', array('controller' => 'relatorios', 'action' => 'index'), array('class' => 'ico-doc-text btn')); ?>
                    </li>
            </menu>
        </header>
        <div id="container">
            <article>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </article>
        </div>
        <footer id="footer">
        </footer>
        <?php
        echo $this->Html->script('/app/webroot/edge/javascripts/locastyle');
        echo $this->Html->script('/app/webroot/edge/bootstrap/js/bootstrap');
        echo $this->fetch('script');
        
        echo $this->element('sql_dump');
        ?>
    </body>
</html>