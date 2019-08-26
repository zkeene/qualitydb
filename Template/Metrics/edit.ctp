<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Metric $metric
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Metric']);?>
    </ul>
</nav>
<div class="metrics form large-9 medium-8 columns content">
    <?= $this->Form->create($metric) ?>
    <fieldset>
        <legend><?= __('Edit Metric') ?></legend>
        <?= $this->Form->control('metric') ?>
            <?= $this->Form->control('metric_def', ['label' => 'Metric Definition']) ?>
            <?= $this->Form->control('numerator_definition') ?>
            <?= $this->Form->control('denominator_definition') ?>
            <?= $this->Form->control('exclusion_definition', ['label' => 'Exclusions/Exceptions']) ?>
            <?= $this->Form->control('is_calculated_metric', ['label' => 'Calculated Metric']) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
