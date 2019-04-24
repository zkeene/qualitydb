<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayCycle $payCycle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Pay Cycle']);?>
    </ul>
</nav>
<div class="payCycles view large-9 medium-8 columns content">
    <h3><?= h($payCycle->pay_cycle) ?></h3>
    <div class="related">
        <h4><?= __('Related Contracts') ?></h4>
        <?php if (!empty($payCycle->contracts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Provider') ?></th>
                <th scope="col"><?= __('Total Incentive Amount') ?></th>
                <th scope="col"><?= __('Fte') ?></th>
                <th scope="col"><?= __('Effective Date') ?></th>
                <th scope="col"><?= __('Effective Quality Date') ?></th>
                <th scope="col"><?= __('Amendment Date') ?></th>
                <th scope="col"><?= __('Default Expire Date') ?></th>
                <th scope="col"><?= __('Inactive Date') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Datetime Stamp') ?></th>
                <th scope="col"><?= __('User') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($payCycle->contracts as $contracts): ?>
            <tr>
                <td><?= h($contracts->provider->provider_name) ?></td>
                <td><?= h($contracts->total_incentive_amount) ?></td>
                <td><?= h($contracts->fte) ?></td>
                <td><?= $this->Html->link($contracts->effective_date, ['controller' => 'Contracts', 'action' => 'view', $contracts->id]) ?></td>
                <td><?= h($contracts->effective_quality_date) ?></td>
                <td><?= h($contracts->amendment_date) ?></td>
                <td><?= h($contracts->default_expire_date) ?></td>
                <td><?= h($contracts->inactive_date) ?></td>
                <td><?= h($contracts->active) ?></td>
                <td><?= h($contracts->datetime_stamp) ?></td>
                <td><?= h($contracts->user->user) ?></td>
                <td class="actions">
                    
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contracts', 'action' => 'edit', $contracts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contracts', 'action' => 'delete', $contracts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contracts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
