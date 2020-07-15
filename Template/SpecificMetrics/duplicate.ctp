<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetric $specificMetric
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Duplicate Specific Metric']);?>
    </ul>
</nav>
<div class="specificMetrics form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Duplicate Specific Metric') ?></legend>
        <table>
            <tr>
                <td><?= $this->Form->control('specific_metric') ?></td>
                <td><?= $this->Form->control('service_line') ?></td>
            </tr>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Duplicate')) ?>
    <?= $this->Form->end() ?>
</div>
