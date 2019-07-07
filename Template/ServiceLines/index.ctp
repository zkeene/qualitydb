<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceLine[]|\Cake\Collection\CollectionInterface $serviceLines
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Service Line']);?>
    </ul>
</nav>
<div class="serviceLines index large-9 medium-8 columns content">
    <h3><?= __('Service Lines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('service_line') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_period_based') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($serviceLines as $serviceLine): ?>
            <tr>
                <td><?= $this->Html->link(__($serviceLine->service_line), ['action' => 'view', $serviceLine->id]) ?></td>
                <td><?= $serviceLine->is_period_based? 'Yes':'No' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serviceLine->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serviceLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceLine->id)]) ?>
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
