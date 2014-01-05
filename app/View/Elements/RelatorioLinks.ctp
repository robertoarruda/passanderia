<div class="btn-group">
    <?php
    echo $this->Html->link('Clientes Credores', array(
        'controller' => 'relatorios',
        'action' => 'clientes_credores'), array(
        'class' => 'btn'
    ));
    echo $this->Html->link('Clientes Devedores', array(
        'controller' => 'relatorios',
        'action' => 'clientes_devedores'), array(
        'class' => 'btn'
    ));
    echo $this->Html->link('Clientes Mais Rentáveis', array(
        'controller' => 'relatorios',
        'action' => 'clientes_mais_rentaveis'), array(
        'class' => 'btn'
    ));
    echo $this->Html->link('Serviços', array(
        'controller' => 'relatorios',
        'action' => 'servicos'), array(
        'class' => 'btn'
    ));
    echo $this->Html->link('Serviços por Cliente', array(
        'controller' => 'relatorios',
        'action' => 'servicos_por_cliente'), array(
        'class' => 'btn'
    ));
    ?>
</div>