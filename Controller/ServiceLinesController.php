<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ServiceLines Controller
 *
 * @property \App\Model\Table\ServiceLinesTable $ServiceLines
 *
 * @method \App\Model\Entity\ServiceLine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceLinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = array (
            'limit' => 50,
            'order' => ['ServiceLines.service_line'=>'ASC']
        );
        $serviceLines = $this->paginate($this->ServiceLines);

        $this->set(compact('serviceLines'));
    }

    /**
     * View method
     *
     * @param string|null $id Service Line id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $serviceLine = $this->ServiceLines->get($id, [
            'contain' => ['Providers', 'SpecificMetrics'=>['sort'=>['SpecificMetrics.year'=>'DESC','SpecificMetrics.metric_order'=>'ASC']], 'Providers.ProviderTypes', 'SpecificMetrics.Metrics']
        ]);

        $this->set('serviceLine', $serviceLine);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $serviceLine = $this->ServiceLines->newEntity();
        if ($this->request->is('post')) {
            $serviceLine = $this->ServiceLines->patchEntity($serviceLine, $this->request->getData());
            if ($this->ServiceLines->save($serviceLine)) {
                $this->Flash->success(__('The service line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service line could not be saved. Please, try again.'));
        }
        $this->set(compact('serviceLine'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service Line id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $serviceLine = $this->ServiceLines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviceLine = $this->ServiceLines->patchEntity($serviceLine, $this->request->getData());
            if ($this->ServiceLines->save($serviceLine)) {
                $this->Flash->success(__('The service line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service line could not be saved. Please, try again.'));
        }
        $this->set(compact('serviceLine'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service Line id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serviceLine = $this->ServiceLines->get($id);
        if ($this->ServiceLines->delete($serviceLine)) {
            $this->Flash->success(__('The service line has been deleted.'));
        } else {
            $this->Flash->error(__('The service line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
