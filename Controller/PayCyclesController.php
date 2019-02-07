<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PayCycles Controller
 *
 * @property \App\Model\Table\PayCyclesTable $PayCycles
 *
 * @method \App\Model\Entity\PayCycle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayCyclesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $payCycles = $this->paginate($this->PayCycles);

        $this->set(compact('payCycles'));
    }

    /**
     * View method
     *
     * @param string|null $id Pay Cycle id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payCycle = $this->PayCycles->get($id, [
            'contain' => ['Contracts', 'Contracts.Providers', 'Contracts.Users']
        ]);

        $this->set('payCycle', $payCycle);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payCycle = $this->PayCycles->newEntity();
        if ($this->request->is('post')) {
            $payCycle = $this->PayCycles->patchEntity($payCycle, $this->request->getData());
            if ($this->PayCycles->save($payCycle)) {
                $this->Flash->success(__('The pay cycle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay cycle could not be saved. Please, try again.'));
        }
        $this->set(compact('payCycle'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Cycle id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payCycle = $this->PayCycles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payCycle = $this->PayCycles->patchEntity($payCycle, $this->request->getData());
            if ($this->PayCycles->save($payCycle)) {
                $this->Flash->success(__('The pay cycle has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay cycle could not be saved. Please, try again.'));
        }
        $this->set(compact('payCycle'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Cycle id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payCycle = $this->PayCycles->get($id);
        if ($this->PayCycles->delete($payCycle)) {
            $this->Flash->success(__('The pay cycle has been deleted.'));
        } else {
            $this->Flash->error(__('The pay cycle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
