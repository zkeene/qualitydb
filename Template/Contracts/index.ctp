<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract[]|\Cake\Collection\CollectionInterface $contracts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('New') ?></li>
        <li><?= $this->Html->link(__('Contract'), ['action' => 'add']) ?></li>
        <li class="heading"><?= __('Listings') ?></li>
        <li><?= $this->Html->link(__('Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Pay Cycles'), ['controller' => 'PayCycles', 'action' => 'index']) ?></li>
        <li class="heading"><?= __('Related New') ?></li>
        <li><?= $this->Html->link(__('Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Pay Cycle'), ['controller' => 'PayCycles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contracts index large-9 medium-8 columns content">
    <h3><?= __('Contracts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('provider_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_incentive_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pay_cycle_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FTE') ?></th>
                <th scope="col"><?= $this->Paginator->sort('effective_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('effective_quality_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amendment_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('default_expire_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inactive_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contracts as $contract): ?>
            <tr>
                <td><?= $contract->has('provider') ? $this->Html->link($contract->provider->provider_name, ['controller' => 'Providers', 'action' => 'view', $contract->provider->id]) : '' ?></td>
                <td><?= $this->Number->currency($contract->total_incentive_amount,'USD',['places'=>0]) ?></td>
                <td><?= $contract->has('pay_cycle') ? $this->Html->link($contract->pay_cycle->pay_cycle, ['controller' => 'PayCycles', 'action' => 'view', $contract->pay_cycle->id]) : '' ?></td>
                <td><?= $this->Number->format($contract->fte) ?></td>
                <td><?= $this->Html->link($contract->effective_date, ['action' => 'view', $contract->id]) ?></td>
                <td><?= h($contract->effective_quality_date) ?></td>
                <td><?= h($contract->amendment_date) ?></td>
                <td><?= h($contract->default_expire_date) ?></td>
                <td><?= h($contract->inactive_date) ?></td>
                <td><?= h($contract->active)? 'Active':'Inactive' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contract->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]) ?>
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
