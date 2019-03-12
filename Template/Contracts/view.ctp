<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contract'), ['action' => 'edit', $contract->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contract'), ['action' => 'delete', $contract->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contract'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pay Cycles'), ['controller' => 'PayCycles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Cycle'), ['controller' => 'PayCycles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contracts view large-9 medium-8 columns content">
    <h3><?= h($contract->provider->provider_name.' - '.$contract->effective_date) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pay Cycle') ?></th>
            <td><?= $contract->has('pay_cycle') ? $this->Html->link($contract->pay_cycle->pay_cycle, ['controller' => 'PayCycles', 'action' => 'view', $contract->pay_cycle->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Incentive Amount') ?></th>
            <td><?= $this->Number->currency($contract->total_incentive_amount,'USD',['places'=>0]) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FTE') ?></th>
            <td><?= $this->Number->format($contract->fte) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Effective Date') ?></th>
            <td><?= h($contract->effective_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Effective Quality Date') ?></th>
            <td><?= h($contract->effective_quality_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amendment Date') ?></th>
            <td><?= h($contract->amendment_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Default Expire Date') ?></th>
            <td><?= h($contract->default_expire_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Inactive Date') ?></th>
            <td><?= h($contract->inactive_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= h($contract->active)? 'Active':'Inactive' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= h($contract->user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datetime Stamp') ?></th>
            <td><?= h($contract->datetime_stamp) ?></td>
        </tr>
    </table>
</div>
