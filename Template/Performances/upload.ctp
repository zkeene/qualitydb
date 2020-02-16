<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Performance $performance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Upload Quarter Data']);?>
    </ul>
</nav>
<div class="performances form large-9 medium-8 columns content">
    <?= $this->Form->create($performance, ['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Upload Quarter Data') ?></legend>
        <table>
            <tr>
                <td><?= $this->Form->control('year') ?></td>
                <td><?= $this->Form->control('quarter') ?></td>
            </tr>
            <tr>
                <td colspan='2'><?= $this->Form->control('metric_id',['options'=>$metrics]) ?></td>
            </tr>
            <tr>
                <td colspan='2'><?= $this->Form->control('provider_id_type',['options'=>$provider_id_types, 'label'=>'Provider ID Type']) ?></td>
            </tr>
            <tr>
                <td colspan='2'><?= $this->Form->file('file') ?></td>
            </tr>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Upload')) ?>
    <?= $this->Form->end() ?>
</div>
