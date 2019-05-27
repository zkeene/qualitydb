<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract[]|\Cake\Collection\CollectionInterface $contracts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Contract']);?>
    </ul>
</nav>
<div class="contracts index large-9 medium-8 columns content">
    <h3><?= __('Contracts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th colspan='2' scope="col"><?= $this->Paginator->sort('provider_name', 'Provider') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_incentive_amount', 'Total Incentive') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pay_cycle_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('FTE') ?></th>
                <th scope="col"><?= $this->Paginator->sort('effective_date', 'Effective') ?></th>
                <th scope="col"><?= $this->Paginator->sort('effective_quality_date', 'Effective Quality') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amendment_date', 'Amendment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('default_expire_date', 'Default Expiration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('inactive_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active', 'Status') ?></th>
                <th colspan='2' scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contracts as $contract): ?>
            <tr>
                <td colspan='2'><?= $contract->has('provider') ? $this->Html->link($contract->provider->provider_name, ['controller' => 'Providers', 'action' => 'view', $contract->provider->id]) : '' ?></td>
                <td><?= $this->Number->currency($contract->total_incentive_amount,'USD',['places'=>0]) ?></td>
                <td><?= $contract->has('pay_cycle') ? $this->Html->link($contract->pay_cycle->pay_cycle, ['controller' => 'PayCycles', 'action' => 'view', $contract->pay_cycle->id]) : '' ?></td>
                <td><?= $this->Number->format($contract->fte) ?></td>
                <td><?= h($contract->effective_date) ?></td>
                <td><?= h($contract->effective_quality_date) ?></td>
                <td><?= h($contract->amendment_date) ?></td>
                <td><?= h($contract->default_expire_date) ?></td>
                <td><?= h($contract->inactive_date) ?></td>
                <td><?= h($contract->active)? 'Active':'Inactive' ?></td>
                <td colspan='2' class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contract->id]) ?>
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
