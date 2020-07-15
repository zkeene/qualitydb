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
        <td><?= $this->Form->control('metric', ['type'=>'select', 'required'=>true, 'hiddenField'=>false,'options' => $search_types]) ?></td>
        <td><?= $this->Form->control('year', ['type'=>'date', 'required'=>true, 'empty' => true]) ?></td>
        <td><?= $this->Form->control('quarter', ['type'=>'date', 'required'=>true, 'empty' => true]) ?></td>
        <td><?= $this->Form->control('confirm', ['type'=>'checkbox', 'required'=>true, 'empty' => true]) ?></td>
        <td><?= $this->Form->button(__('Delete')) ?></td>
        </tr>
        </table>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
