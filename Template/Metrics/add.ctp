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
        <legend><?= __('Add Metric') ?></legend>
        <?php
            echo $this->Form->control('metric');
            echo $this->Form->control('metric_def');
            echo $this->Form->control('is_calculated_metric');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
