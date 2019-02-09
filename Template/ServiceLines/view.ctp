<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceLine $serviceLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Service Line'), ['action' => 'edit', $serviceLine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service Line'), ['action' => 'delete', $serviceLine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceLine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Service Lines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service Line'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specific Metrics'), ['controller' => 'SpecificMetrics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specific Metric'), ['controller' => 'SpecificMetrics', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="serviceLines view large-9 medium-8 columns content">
    <h3><?= h($serviceLine->service_line) ?></h3>
    <div class="related">
        <h4><?= __('Related Providers') ?></h4>
        <?php if (!empty($serviceLine->providers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Provider Name') ?></th>
                <th scope="col"><?= __('Provider Type') ?></th>
                <th scope="col"><?= __('Epic SER') ?></th>
                <th scope="col"><?= __('NPI') ?></th>
                <th scope="col"><?= __('KHN Badge') ?></th>
                <th scope="col"><?= __('Provider Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($serviceLine->providers as $providers): ?>
            <tr>
                <td><?= $this->Html->link(__($providers->provider_name), ['controller' => 'Providers', 'action' => 'view', $providers->id]) ?></td>
                <td><?= h($providers->provider_type->provider_type) ?></td>
                <td><?= h($providers->SER) ?></td>
                <td><?= h($providers->NPI) ?></td>
                <td><?= h($providers->badge_num) ?></td>
                <td><?= h($providers->provider_status)? 'Active':'Inactive' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Providers', 'action' => 'edit', $providers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Providers', 'action' => 'delete', $providers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $providers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Specific Metrics') ?></h4>
        <?php if (!empty($serviceLine->specific_metrics)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Metric') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col"><?= __('Threshold Direction') ?></th>
                <th scope="col"><?= __('Is Gateway Metric') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($serviceLine->specific_metrics as $specificMetrics): ?>
            <tr>
                <td><?= h($specificMetrics->metric->metric) ?></td>
                <td><?= h($specificMetrics->year) ?></td>
                <td><?= h($specificMetrics->threshold_direction)? 'Down':'Up' ?></td>
                <td><?= h($specificMetrics->is_gateway_metric)? 'Yes':'No' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SpecificMetrics', 'action' => 'view', $specificMetrics->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SpecificMetrics', 'action' => 'edit', $specificMetrics->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SpecificMetrics', 'action' => 'delete', $specificMetrics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specificMetrics->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
