<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Overrides Controller
 *
 * @property \App\Model\Table\OverridesTable $Overrides
 *
 * @method \App\Model\Entity\Override[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OverridesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SpecificMetrics', 'Providers']
        ];
        $overrides = $this->paginate($this->Overrides);
        $specificMetrics = $this->Overrides->SpecificMetrics->find('all')->contain(['ServiceLines','Metrics']);
        $providers = $this->Overrides->Providers->find('list');
        $this->set(compact('overrides', 'specificMetrics', 'providers'));
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $override = $this->Overrides->newEntity();
        if ($this->request->is('post')) {
            $override = $this->Overrides->patchEntity($override, $this->request->getData());
            if ($this->Overrides->save($override)) {
                $this->Flash->success(__('The override has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The override could not be saved. Please, try again.'));
        }
        $specificMetrics = $this->Overrides->SpecificMetrics->find('all')->contain(['ServiceLines','Metrics']);
        $providers = $this->Overrides->Providers->find('list');
        $this->set(compact('override', 'specificMetrics', 'providers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Override id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $override = $this->Overrides->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $override = $this->Overrides->patchEntity($override, $this->request->getData());
            if ($this->Overrides->save($override)) {
                $this->Flash->success(__('The override has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The override could not be saved. Please, try again.'));
        }
        $specificMetrics = $this->Overrides->SpecificMetrics->find('all')->contain(['ServiceLines','Metrics']);
        $providers = $this->Overrides->Providers->find('list');
        $this->set(compact('override', 'specificMetrics', 'providers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Override id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $override = $this->Overrides->get($id);
        if ($this->Overrides->delete($override)) {
            $this->Flash->success(__('The override has been deleted.'));
        } else {
            $this->Flash->error(__('The override could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
