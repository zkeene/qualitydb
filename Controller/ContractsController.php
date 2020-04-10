<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contracts Controller
 *
 * @property \App\Model\Table\ContractsTable $Contracts
 *
 * @method \App\Model\Entity\Contract[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContractsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->redirect(['controller'=>'Providers', 'action'=>'index']);
    }

    /**
     * View method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contract = $this->Contracts->get($id, [
            'contain' => ['Providers', 'PayCycles']
        ]);

        $this->set('contract', $contract);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($provider_id = null)
    {
        $contract = $this->Contracts->newEntity();
        if ($this->request->is('post')) {
            $contract = $this->Contracts->patchEntity($contract, $this->request->getData());
            if ($this->Contracts->save($contract)) {
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['controller'=>'Providers', 'action'=>'view', $contract->provider_id]);;
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $providers = $this->Contracts->Providers->find('list');
        $payCycles = $this->Contracts->PayCycles->find('list', ['limit' => 200]);
        $this->set(compact('contract', 'providers', 'payCycles', 'provider_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contract = $this->Contracts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contract = $this->Contracts->patchEntity($contract, $this->request->getData());
            if ($this->Contracts->save($contract)) {
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['controller'=>'Providers', 'action'=>'view', $contract->provider_id]);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $providers = $this->Contracts->Providers->find('list');
        $payCycles = $this->Contracts->PayCycles->find('list', ['limit' => 200]);
        $this->set(compact('contract', 'providers', 'payCycles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contract = $this->Contracts->get($id);
        if ($this->Contracts->delete($contract)) {
            $this->Flash->success(__('The contract has been deleted.'));
        } else {
            $this->Flash->error(__('The contract could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller'=>'Providers', 'action'=>'view', $contract->provider_id]);
    }

    /**
     * Find method
     *
     * @return \Cake\Http\Response|null Redirects on search, renders view otherwise.
     */
    public function find()
    {
        $contracts = null;
        if ($this->request->is('post')) {
            $contract_search = $this->request->getData();
            $start_date = $contract_search['start_date']['year'].'-'.$contract_search['start_date']['month'].'-'.$contract_search['start_date']['day'];
            $end_date = $contract_search['end_date']['year'].'-'.$contract_search['end_date']['month'].'-'.$contract_search['end_date']['day'];
            $query = $this->Contracts->find('all',[
                'conditions' => [
                    $contract_search['search_type'].' >=' => $start_date,
                    $contract_search['search_type'].' <=' => $end_date
                ]
            ]);
            $this->paginate = [
                'contain' => ['Providers']
            ];
            
            $contracts = $this->paginate($query);
        }
        $search_types = ['effective_date' => 'Effective Date','effective_quality_date' => 'Effective Quality Date','inactive_date' => 'Inactive Date'];
        $this->set(compact('search_types','contracts'));
    }
}
