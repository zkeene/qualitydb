<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProviderType $providerType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Provider Type'), ['action' => 'edit', $providerType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Provider Type'), ['action' => 'delete', $providerType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $providerType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Provider Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="providerTypes view large-9 medium-8 columns content">
    <h3><?= h($providerType->provider_type) ?></h3>
    <div class="related">
        <h4><?= __('Related Providers') ?></h4>
        <?php if (!empty($providerType->providers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Provider Name') ?></th>
                <th scope="col"><?= __('Service Line') ?></th>
                <th scope="col"><?= __('SER') ?></th>
                <th scope="col"><?= __('NPI') ?></th>
                <th scope="col"><?= __('Badge Num') ?></th>
                <th scope="col"><?= __('Provider Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($providerType->providers as $providers): ?>
            <tr>
                <td><?= $this->Html->link(__($providers->provider_name), ['controller' => 'Providers', 'action' => 'view', $providers->id]) ?></td>
                <td><?= h($providers->service_line->service_line) ?></td>
                <td><?= h($providers->SER) ?></td>
                <td><?= h($providers->NPI) ?></td>
                <td><?= h($providers->badge_num) ?></td>
                <td><?= h($providers->provider_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Providers', 'action' => 'edit', $providers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Providers', 'action' => 'delete', $providers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $providers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
