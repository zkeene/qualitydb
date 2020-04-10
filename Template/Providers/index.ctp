<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provider[]|\Cake\Collection\CollectionInterface $providers
 */
$this->Html->script('https://code.jquery.com/jquery.min.js',['block'=>true]); //Search
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Provider']);?>
    </ul>
</nav>
<div class="providers index large-9 medium-8 columns content">
    <h3><?= __('Providers') ?></h3>
    <?= $this->Form->control('search');?> <!--Search-->
    <div id="table-content"><!--Search-->
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" colspan="2"><?= $this->Paginator->sort('provider_name', 'Name') ?></th>
                    <th scope="col" colspan="2"><?= $this->Paginator->sort('service_line_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('provider_type_id', 'Type') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('SER', 'Epic SER') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('badge_num', 'KHN Badge') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('provider_status', 'Status') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($providers as $provider): ?>
                <tr>
                    <td colspan="2"><?= $this->Html->link(__($provider->provider_name), ['action' => 'view', $provider->id]) ?></td>
                    <td colspan="2"><?= $provider->has('service_line') ? $this->Html->link($provider->service_line->service_line, ['controller' => 'ServiceLines', 'action' => 'view', $provider->service_line->id]) : '' ?></td>
                    <td><?= $provider->has('provider_type') ? $this->Html->link($provider->provider_type->provider_type, ['controller' => 'ProviderTypes', 'action' => 'view', $provider->provider_type->id]) : '' ?></td>
                    <td><?= h($provider->SER) ?></td>
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
    </div>
</div><!--Search-->
<!--Search-->
<script>
    $('document').ready(function () {
        $('#search').keyup(function(){
            searchRecords ($(this).val());
        });

        function searchRecords (keyword){
            var data = keyword;
            $.ajax({
                method: 'get',
                url: "<?php echo $this->Url->build(['controller'=>'Providers', 'action' => 'Search'])?>",
                data: {keyword:data},
                success: function(response){
                    $('#table-content').html(response);
                }
            });
        };
    });
</script>