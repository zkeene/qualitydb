<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Providers Controller
 *
 * @property \App\Model\Table\ProvidersTable $Providers
 *
 * @method \App\Model\Entity\Provider[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProvidersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ServiceLines', 'ProviderTypes']
        ];
        $providers = $this->paginate($this->Providers);

        $this->set(compact('providers'));
    }

    /**
     * View method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provider = $this->Providers->get($id, [
            'contain' => [
                'ServiceLines', 
                'ProviderTypes', 
                'Contracts', 
                'Performances' => [
                    'sort' => ['Performances.year' => 'DESC','Performances.quarter'=>'DESC', 'Metrics.metric'=>'ASC']
                ],
                'Contracts.PayCycles', 
                'Performances.Metrics'
            ]
        ]);

        $performancesQuery = $this->Providers->Performances->find('all',['contain'=>['Metrics']])
            ->innerJoinWith('Providers', function($query) use ($provider) {
                return $query->where([
                    'Providers.id' => $provider->id
                ]);
            })->group('Performances.id')->order(['year'=>'DESC', 'quarter'=>'DESC', 'Metrics.metric'=>'ASC']);
        
        $performances = $this->paginate($performancesQuery,['limit'=>'10']);

        $this->set(compact('provider','performances'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $provider = $this->Providers->newEntity();
        if ($this->request->is('post')) {
            $provider = $this->Providers->patchEntity($provider, $this->request->getData());
            if ($this->Providers->save($provider)) {
                $this->Flash->success(__('The provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provider could not be saved. Please, try again.'));
        }
        $serviceLines = $this->Providers->ServiceLines->find('list', ['limit' => 200, 'order'=>['ServiceLines.service_line'=>'ASC']]);
        $providerTypes = $this->Providers->ProviderTypes->find('list', ['limit' => 200,'order'=>['ProviderTypes.provider_type'=>'ASC']]);
        $this->set(compact('provider', 'serviceLines', 'providerTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $provider = $this->Providers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provider = $this->Providers->patchEntity($provider, $this->request->getData());
            if ($this->Providers->save($provider)) {
                $this->Flash->success(__('The provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provider could not be saved. Please, try again.'));
        }
        $serviceLines = $this->Providers->ServiceLines->find('list', ['limit' => 200, 'order'=>['ServiceLines.service_line'=>'ASC']]);
        $providerTypes = $this->Providers->ProviderTypes->find('list', ['limit' => 200,'order'=>['ProviderTypes.provider_type'=>'ASC']]);
        $this->set(compact('provider', 'serviceLines', 'providerTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provider = $this->Providers->get($id);
        if ($this->Providers->delete($provider)) {
            $this->Flash->success(__('The provider has been deleted.'));
        } else {
            $this->Flash->error(__('The provider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function search(){
        $this->request->allowMethod('ajax');
        $keyword = $this->request->query('keyword');
        $query = $this->Providers->find('all',[
            'conditions' => ['provider_name LIKE'=>'%'.$keyword.'%']
        ]);
        $this->paginate = [
            'contain' => ['ServiceLines', 'ProviderTypes']
        ];
        $this->set('providers',$this->paginate($query));
        $this->set('_serialize',['providers']);
    }
}
