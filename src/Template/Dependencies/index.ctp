<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dependency[]|\Cake\Collection\CollectionInterface $dependencies
 */
?>
<div class="dependencies index large-9 medium-8 columns content">
    <h3 class="float-left"><?= __('Dependencias') ?></h3>
    
    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-lg fa-plus-square pr-1 float-right')), array('action' => 'add'), array('escape' => false)) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name','Siglas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longname','Nombre') ?></th>
                <th scope="col" class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dependencies as $dependency): ?>
            <tr>
                <td><?= $this->Html->link($dependency->name, ['action' => 'edit', $dependency->id]) ?></td>
                <td><?= h($dependency->longname) ?></td>
                <td class="actions">
                    
                    <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-lg fa-eye pr-1')), array('action' => 'view', $dependency->id), array('escape' => false)) ?>
                    
                    <?= $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-lg fa-trash')), array('action' => 'delete', $dependency->id), array('escape' => false), __('Deseas eliminar esta dependencia?')); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
