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
        <legend><?= __('Add Override') ?></legend>
        <?php
            $specificMetricsDisplay = array();
            foreach ($specificMetrics as $specificMetric) {
                $specificMetricsDisplay[$specificMetric->id] = $specificMetric->specific_metric_name;
            }
            asort($specificMetricsDisplay);
        ?>
        <?= $this->Form->control('override_type', ['options' => $override->getOverrideTypes(), 'empty' => true, 'onchange'=>'changeOverrideType(this)']) ?>
        <div id="specific_metric" style="display: none;"><?= $this->Form->control('specific_metric_id', ['options' => $specificMetricsDisplay, 'empty' => true]) ?></div>
        <div id="provider" style="display: none;"><?= $this->Form->control('provider_id', ['options' => $providers, 'empty' => true]) ?></div>
        <?= $this->Form->control('time_frame', ['options' => $override->getTimeFrames(), 'empty' => true, 'onchange' => 'changeTimeFrame(this)']) ?>
        <div id="quarter" style="display: none;"><?= $this->Form->control('target_quarter') ?></div>
        <?= $this->Form->control('target_year') ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
function changeOverrideType(element)
{
    if (element.value==0) {
        document.getElementById('specific_metric').style.display = 'block';
        document.getElementById('provider').style.display = 'none';
    } else {
        document.getElementById('specific_metric').style.display = 'none';
        document.getElementById('provider').style.display = 'block';
    }
}
function changeTimeFrame(element)
{
        document.getElementById('quarter').style.display = element.value == 0 ? 'none' : 'block';
}
</script>
