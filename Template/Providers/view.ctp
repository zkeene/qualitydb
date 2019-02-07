<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provider $provider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Provider'), ['action' => 'edit', $provider->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Provider'), ['action' => 'delete', $provider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provider->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Service Lines'), ['controller' => 'ServiceLines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service Line'), ['controller' => 'ServiceLines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provider Types'), ['controller' => 'ProviderTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider Type'), ['controller' => 'ProviderTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Performances'), ['controller' => 'Performances', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Performance'), ['controller' => 'Performances', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="providers view large-9 medium-8 columns content">
    <h3><?= h($provider->provider_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Service Line') ?></th>
            <td><?= $provider->has('service_line') ? $this->Html->link($provider->service_line->service_line, ['controller' => 'ServiceLines', 'action' => 'view', $provider->service_line->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Provider Type') ?></th>
            <td><?= $provider->has('provider_type') ? $this->Html->link($provider->provider_type->provider_type, ['controller' => 'ProviderTypes', 'action' => 'view', $provider->provider_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SER') ?></th>
            <td><?= h($provider->SER) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NPI') ?></th>
            <td><?= h($provider->NPI) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Badge Num') ?></th>
            <td><?= h($provider->badge_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Provider Status') ?></th>
            <td><?= $this->Number->format($provider->provider_status) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contracts') ?></h4>
        <?php if (!empty($provider->contracts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Provider Id') ?></th>
                <th scope="col"><?= __('Total Incentive Amount') ?></th>
                <th scope="col"><?= __('Pay Cycle Id') ?></th>
                <th scope="col"><?= __('Fte') ?></th>
                <th scope="col"><?= __('Effective Date') ?></th>
                <th scope="col"><?= __('Effective Quality Date') ?></th>
                <th scope="col"><?= __('Amendment Date') ?></th>
                <th scope="col"><?= __('Default Expire Date') ?></th>
                <th scope="col"><?= __('Inactive Date') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col"><?= __('Datetime Stamp') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($provider->contracts as $contracts): ?>
            <tr>
                <td><?= h($contracts->id) ?></td>
                <td><?= h($contracts->provider_id) ?></td>
                <td><?= h($contracts->total_incentive_amount) ?></td>
                <td><?= h($contracts->pay_cycle_id) ?></td>
                <td><?= h($contracts->fte) ?></td>
                <td><?= h($contracts->effective_date) ?></td>
                <td><?= h($contracts->effective_quality_date) ?></td>
                <td><?= h($contracts->amendment_date) ?></td>
                <td><?= h($contracts->default_expire_date) ?></td>
                <td><?= h($contracts->inactive_date) ?></td>
                <td><?= h($contracts->active) ?></td>
                <td><?= h($contracts->datetime_stamp) ?></td>
                <td><?= h($contracts->user_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Performances') ?></h4>
        <?php if (!empty($provider->performances)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Provider Id') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Metric Id') ?></th>
                <th scope="col"><?= __('Numerator') ?></th>
                <th scope="col"><?= __('Denominator') ?></th>
                <th scope="col"><?= __('Quarter') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($provider->performances as $performances): ?>
            <tr>
                <td><?= h($performances->id) ?></td>
                <td><?= h($performances->provider_id) ?></td>
                <td><?= h($performances->location_id) ?></td>
                <td><?= h($performances->metric_id) ?></td>
                <td><?= h($performances->numerator) ?></td>
                <td><?= h($performances->denominator) ?></td>
                <td><?= h($performances->quarter) ?></td>
                <td><?= h($performances->year) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Performances', 'action' => 'view', $performances->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Performances', 'action' => 'edit', $performances->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Performances', 'action' => 'delete', $performances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $performances->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
