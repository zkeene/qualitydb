<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Performances'), ['controller' => 'Performances', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Performance'), ['controller' => 'Performances', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->location_name) ?></h3>
    <div class="related">
        <h4><?= __('Related Performances') ?></h4>
        <?php if (!empty($location->performances)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Provider') ?></th>
                <th scope="col"><?= __('Metric') ?></th>
                <th scope="col"><?= __('Numerator') ?></th>
                <th scope="col"><?= __('Denominator') ?></th>
                <th scope="col"><?= __('Quarter') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->performances as $performances): ?>
            <tr>
                <td><?= h($performances->provider->provider_name) ?></td>
                <td><?= h($performances->metric->metric) ?></td>
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
