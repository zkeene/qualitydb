<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Find Contract']);?>
    </ul>
</nav>
<div class="contracts form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Find Contract') ?></legend>
        <table>
        <tr>
        <td><?= $this->Form->control('search_type', ['type'=>'radio', 'required'=>true, 'hiddenField'=>false,'options' => $search_types]) ?></td>
        <td><?= $this->Form->control('start_date', ['type'=>'date', 'required'=>true, 'empty' => true]) ?></td>
        <td><?= $this->Form->control('end_date', ['type'=>'date', 'required'=>true, 'empty' => true]) ?></td>
        <td><?= $this->Form->button(__('Find')) ?></td>
        </tr>
        </table>
    </fieldset>
    <?= $this->Form->end() ?>

    <div id="table-content">
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">Provider Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contracts as $contract): ?>
                <tr>
                    <td><?= $this->Html->link(__($contract->provider->provider_name), ['controller'=>'Providers', 'action' => 'view', $contract->provider->id]) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>
    </div>
</div>
