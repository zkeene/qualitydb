<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProviderType[]|\Cake\Collection\CollectionInterface $providerTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Provider Type']);?>
    </ul>
</nav>
<div class="providerTypes index large-9 medium-8 columns content">
    <h3><?= __('Provider Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('provider_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($providerTypes as $providerType): ?>
            <tr>
                <td><?= $this->Html->link(__($providerType->provider_type), ['action' => 'view', $providerType->id]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $providerType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $providerType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $providerType->id)]) ?>
                </td>
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
