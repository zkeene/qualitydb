<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ThresholdColor $thresholdColor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Threshold Color']);?>
    </ul>
</nav>
<div class="thresholdColors form large-9 medium-8 columns content">
    <?= $this->Form->create($thresholdColor) ?>
    <fieldset>
        <legend><?= __('Add Threshold Color') ?></legend>
        <?= $this->Form->control('color') ?>
        <?= $this->Form->control('color_hex') ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
