<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Contract']);?>
    </ul>>
</nav>
<div class="contracts view large-9 medium-8 columns content">
    <h3><?= h($contract->provider->provider_name.' - '.$contract->effective_date) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pay Cycle') ?></th>
            <td><?= $contract->has('pay_cycle') ? $this->Html->link($contract->pay_cycle->pay_cycle, ['controller' => 'PayCycles', 'action' => 'view', $contract->pay_cycle->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Incentive') ?></th>
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
            <th scope="row"><?= __('Default Expiration') ?></th>
            <td><?= h($contract->default_expire_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Inactive Date') ?></th>
            <td><?= h($contract->inactive_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($contract->active)? 'Active':'Inactive' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comments') ?></th>
            <td><?= h($contract->comments) ?></td>
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
