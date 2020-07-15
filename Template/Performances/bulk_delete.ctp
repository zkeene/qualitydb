<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Performance $performance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Delete Performances']);?>
    </ul>
</nav>
<div class="contracts form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Delete Performances') ?></legend>
        <table>
        <tr>
        <td colspan='3'><?= $this->Form->control('metric', ['type'=>'select', 'required'=>true, 'options' => $metrics]) ?></td>
        </tr>
        <tr>
        <td><?= $this->Form->control('year',['required'=>true]) ?></td>
        <td><?= $this->Form->control('period_type', ['type'=>'select', 'required'=>true, 'options' => $period_types]) ?></td>
        <td><?= $this->Form->control('quarter', ['type'=>'select', 'required'=>true, 'options' => $quarters, 'label'=>'Quarter/Period']) ?></td>
        </tr>
        <tr>
        <td colspan='2'><?= $this->Form->control('confirm', ['type'=>'checkbox', 'required'=>true, 'empty' => true]) ?></td>
        <td><?= $this->Form->button(__('Delete')) ?></td>
        </tr>
        </table>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
