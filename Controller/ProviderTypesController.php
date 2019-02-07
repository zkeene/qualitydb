<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProviderTypes Controller
 *
 * @property \App\Model\Table\ProviderTypesTable $ProviderTypes
 *
 * @method \App\Model\Entity\ProviderType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProviderTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $providerTypes = $this->paginate($this->ProviderTypes);

        $this->set(compact('providerTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Provider Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $providerType = $this->ProviderTypes->get($id, [
            'contain' => ['Providers', 'Providers.ServiceLines']
        ]);

        $this->set('providerType', $providerType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $providerType = $this->ProviderTypes->newEntity();
        if ($this->request->is('post')) {
            $providerType = $this->ProviderTypes->patchEntity($providerType, $this->request->getData());
            if ($this->ProviderTypes->save($providerType)) {
                $this->Flash->success(__('The provider type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provider type could not be saved. Please, try again.'));
        }
        $this->set(compact('providerType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Provider Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $providerType = $this->ProviderTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $providerType = $this->ProviderTypes->patchEntity($providerType, $this->request->getData());
            if ($this->ProviderTypes->save($providerType)) {
                $this->Flash->success(__('The provider type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provider type could not be saved. Please, try again.'));
        }
        $this->set(compact('providerType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Provider Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $providerType = $this->ProviderTypes->get($id);
        if ($this->ProviderTypes->delete($providerType)) {
            $this->Flash->success(__('The provider type has been deleted.'));
        } else {
            $this->Flash->error(__('The provider type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
