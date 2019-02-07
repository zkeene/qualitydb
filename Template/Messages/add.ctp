<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Specific Metric Thresholds'), ['controller' => 'SpecificMetricThresholds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specific Metric Threshold'), ['controller' => 'SpecificMetricThresholds', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="messages form large-9 medium-8 columns content">
    <?= $this->Form->create($message) ?>
    <fieldset>
        <legend><?= __('Add Message') ?></legend>
        <?php
            echo $this->Form->control('message');
            echo $this->Form->control('message_title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
