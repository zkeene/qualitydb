<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ThresholdColor $thresholdColor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $thresholdColor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $thresholdColor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Threshold Colors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Specific Metric Thresholds'), ['controller' => 'SpecificMetricThresholds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specific Metric Threshold'), ['controller' => 'SpecificMetricThresholds', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="thresholdColors form large-9 medium-8 columns content">
    <?= $this->Form->create($thresholdColor) ?>
    <fieldset>
        <legend><?= __('Edit Threshold Color') ?></legend>
        <?php
            echo $this->Form->control('color');
            echo $this->Form->control('color_hex');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
