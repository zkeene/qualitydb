<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetric $specificMetric
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Duplicate Year']);?>
    </ul>
</nav>
<div class="specificMetrics form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Duplicate Year') ?></legend>
        <table>
            <tr>
                <td><?= $this->Form->control('source_year') ?></td>
                <td><?= $this->Form->control('target_year') ?></td>
            </tr>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Duplicate Year')) ?>
    <?= $this->Form->end() ?>
</div>
