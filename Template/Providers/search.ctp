<table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('provider_name', 'Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('service_line_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('provider_type_id', 'Type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SER', 'Epic SER') ?></th>
                <th scope="col"><?= $this->Paginator->sort('NPI') ?></th>
                <th scope="col"><?= $this->Paginator->sort('badge_num', 'KHN Badge') ?></th>
                <th scope="col"><?= $this->Paginator->sort('provider_status', 'Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($providers as $provider): ?>
            <tr>
                <td><?= $this->Html->link(__($provider->provider_name), ['action' => 'view', $provider->id]) ?></td>
                <td><?= $provider->has('service_line') ? $this->Html->link($provider->service_line->service_line, ['controller' => 'ServiceLines', 'action' => 'view', $provider->service_line->id]) : '' ?></td>
                <td><?= $provider->has('provider_type') ? $this->Html->link($provider->provider_type->provider_type, ['controller' => 'ProviderTypes', 'action' => 'view', $provider->provider_type->id]) : '' ?></td>
                <td><?= h($provider->SER) ?></td>
                <td><?= h($provider->NPI) ?></td>
                <td><?= h($provider->badge_num) ?></td>
                <td><?= $this->Number->format($provider->provider_status)? 'Active':'Inactive' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $provider->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $provider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provider->id)]) ?>
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