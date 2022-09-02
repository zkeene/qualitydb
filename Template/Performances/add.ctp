<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Performance $performance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Performances']);?>
    </ul>
</nav>
<div class="performances form large-9 medium-8 columns content">
    <?= $this->Form->create($performance) ?>
    <fieldset>
        <legend><?= __('Add Performance') ?></legend>
        <?php
            echo $this->Form->control('provider_id', ['options' => $providers, 'default' => $provider_id]);
            echo $this->Form->control('metric_id', ['options' => $metrics]);
            echo $this->Form->control('numerator');
            echo $this->Form->control('denominator');
            echo $this->Form->control('quarter');
            echo $this->Form->control('year');
            echo $this->Form->control('period_performance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
