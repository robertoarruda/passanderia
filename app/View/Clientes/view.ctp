<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?= $cliente['Cliente']['nome']; ?></h3>
</div>
<div class="modal-body">
    <p><strong>Endereço: </strong><?= $cliente['Cliente']['endereco']; ?></p>
    <p><strong>Bairro: </strong><?= $cliente['Cliente']['bairro']; ?></p>
    <p><strong>Telefone: </strong><?= $cliente['Cliente']['telefone']; ?></p>
    <p><strong>Celular: </strong><?= $cliente['Cliente']['celular']; ?></p>
    <p><strong>Saldo: </strong><?= $this->ColorNumber->execute($cliente['Cliente']['saldo']); ?></p>
    <p><strong>Log Saldo: </strong></p>
    <div class="log-cliente">
        <?php
        if (!empty($cliente['Cliente']['log'])) : foreach ($cliente['Cliente']['log'] as $key => $log) :
            echo $log['SaldoLog']['log'];
        endforeach;
        endif;
        ?>
    </div>
</div>
<div class="modal-footer">
    <?php
    echo $this->Html->link('Fechar', '#', array(
        'div' => false,
        'class' => 'btn btn-fechar',
        'data-dismiss' => 'modal'
    ));
    ?>
</div>