<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Pagamento</h3>
</div>
<div class="modal-body">
    <?php
    $this->Number->addFormat(
        'BRR',
        array(
            'before' => 'R$ ',
            'places' => 2,
            'zero' => '',
            'thousands' => '.',
            'decimals' => ','
        )
    );
    $this->Number->defaultCurrency('BRR');
    ?>
    <p><strong>Código: </strong><?= $pagamento['Pagamento']['id']; ?></p>
    <p><strong>Data: </strong><?= $this->Time->format('d/m/Y', $pagamento['Pagamento']['created']); ?></p>
    <p><strong>Valor: </strong><?= ($pagamento['Pagamento']['valor']) ? $this->Number->currency($pagamento['Pagamento']['valor']) : ''; ?></p>
    <p><strong>Comentários: </strong><?= $pagamento['Pagamento']['comentarios']; ?></p>
</div>
<div class="modal-footer">
    <?php
    echo $this->Html->link('Fechar', '#', array('div' => false,
        'class' => 'btn btn-fechar',
        'data-dismiss' => 'modal'
    ));
    ?>
</div>