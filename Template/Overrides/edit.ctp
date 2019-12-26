<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Override $override
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Default Override']);?>
    </ul>
</nav>
<div class="overrides form large-9 medium-8 columns content">
    <?= $this->Form->create($override) ?>
    <fieldset>
        <legend><?= __('Edit Override') ?></legend>
        <?php
            $specificMetricsDisplay = array();
            foreach ($specificMetrics as $specificMetric) {
                $specificMetricsDisplay[$specificMetric->id] = $specificMetric->specific_metric_name;
            }
            asort($specificMetricsDisplay);
            echo $this->Form->control('override_type', ['options' => $override->getOverrideTypes()]);
            echo $this->Form->control('specific_metric_id', ['options' => $specificMetricsDisplay, 'empty' => true]);
            echo $this->Form->control('provider_id', ['options' => $providers, 'empty' => true]);
            echo $this->Form->control('time_frame', ['options' => $override->getTimeFrames(), 'empty' => true]);
            echo $this->Form->control('target_quarter');
            echo $this->Form->control('target_year');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
