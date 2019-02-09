<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li class="heading"><?= __('Related Actions') ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->user) ?></h3>
    <div class="related">
        <h4><?= __('Related Contracts') ?></h4>
        <?php if (!empty($user->contracts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Provider Id') ?></th>
                <th scope="col"><?= __('Total Incentive Amount') ?></th>
                <th scope="col"><?= __('Pay Cycle Id') ?></th>
                <th scope="col"><?= __('FTE') ?></th>
                <th scope="col"><?= __('Effective Date') ?></th>
                <th scope="col"><?= __('Effective Quality Date') ?></th>
                <th scope="col"><?= __('Amendment Date') ?></th>
                <th scope="col"><?= __('Default Expire Date') ?></th>
                <th scope="col"><?= __('Inactive Date') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Datetime Stamp') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->contracts as $contracts): ?>
            <tr>
                <td><?= h($contracts->provider_id) ?></td>
                <td><?= $this->Number->currency($contracts->total_incentive_amount,'USD',['places'=>0]) ?></td>
                <td><?= h($contracts->pay_cycle_id) ?></td>
                <td><?= h($contracts->fte) ?></td>
                <td><?= h($contracts->effective_date) ?></td>
                <td><?= h($contracts->effective_quality_date) ?></td>
                <td><?= h($contracts->amendment_date) ?></td>
                <td><?= h($contracts->default_expire_date) ?></td>
                <td><?= h($contracts->inactive_date) ?></td>
                <td><?= h($contracts->active)? 'Active':'Inactive' ?></td>
                <td><?= h($contracts->datetime_stamp) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contracts', 'action' => 'view', $contracts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contracts', 'action' => 'edit', $contracts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contracts', 'action' => 'delete', $contracts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contracts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
