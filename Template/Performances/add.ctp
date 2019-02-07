<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Performance $performance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Performances'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Metrics'), ['controller' => 'Metrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Metric'), ['controller' => 'Metrics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="performances form large-9 medium-8 columns content">
    <?= $this->Form->create($performance) ?>
    <fieldset>
        <legend><?= __('Add Performance') ?></legend>
        <?php
            echo $this->Form->control('provider_id', ['options' => $providers]);
            echo $this->Form->control('location_id', ['options' => $locations]);
            echo $this->Form->control('metric_id', ['options' => $metrics]);
            echo $this->Form->control('numerator');
            echo $this->Form->control('denominator');
            echo $this->Form->control('quarter');
            echo $this->Form->control('year');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
