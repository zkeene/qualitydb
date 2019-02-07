<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Metric $metric
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Metrics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Performances'), ['controller' => 'Performances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Performance'), ['controller' => 'Performances', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specific Metrics'), ['controller' => 'SpecificMetrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specific Metric'), ['controller' => 'SpecificMetrics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="metrics form large-9 medium-8 columns content">
    <?= $this->Form->create($metric) ?>
    <fieldset>
        <legend><?= __('Add Metric') ?></legend>
        <?php
            echo $this->Form->control('metric');
            echo $this->Form->control('metric_def');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
