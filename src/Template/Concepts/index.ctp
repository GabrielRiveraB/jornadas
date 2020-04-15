<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concept[]|\Cake\Collection\CollectionInterface $concepts
 */
?>

<div class="concepts index large-9 medium-8 columns content">
    <h3><?= __('Categorías') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name','Nombre') ?></th>
                <th scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($concepts as $concept): ?>
            <tr>
                <td><?= $this->Html->link($concept->name, ['action' => 'edit', $concept->id]) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-lg fa-eye pr-1')), array('action' => 'view', $concept->id), array('escape' => false)) ?>
                    <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-lg fa-trash')), array('action' => 'delete', $concept->id), array('escape' => false), __('Deseas eliminar esta dependencia?')); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $this->element('table_paginate'); ?>
</div>
