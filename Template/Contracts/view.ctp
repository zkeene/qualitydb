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
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contracts view large-9 medium-8 columns content">
    <h3><?= h($contract->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Provider') ?></th>
            <td><?= $contract->has('provider') ? $this->Html->link($contract->provider->id, ['controller' => 'Providers', 'action' => 'view', $contract->provider->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pay Cycle') ?></th>
            <td><?= $contract->has('pay_cycle') ? $this->Html->link($contract->pay_cycle->id, ['controller' => 'PayCycles', 'action' => 'view', $contract->pay_cycle->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= h($contract->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $contract->has('user') ? $this->Html->link($contract->user->id, ['controller' => 'Users', 'action' => 'view', $contract->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contract->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Incentive Amount') ?></th>
            <td><?= $this->Number->format($contract->total_incentive_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fte') ?></th>
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
            <th scope="row"><?= __('Datetime Stamp') ?></th>
            <td><?= h($contract->datetime_stamp) ?></td>
        </tr>
    </table>
</div>
