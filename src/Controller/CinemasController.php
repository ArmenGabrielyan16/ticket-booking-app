<?php
namespace App\Controller;

/**
 * Cinemas Controller
 *
 *
 * @method \App\Model\Entity\Cinema[] paginate($object = null, array $settings = [])
 */
class CinemasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cinemas = $this->paginate($this->Cinemas);

        $this->set(compact('cinemas'));
        $this->set('_serialize', ['cinemas']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cinema = $this->Cinemas->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if (!empty($data['name'])) {
                $cinema = $this->Cinemas->patchEntity($cinema, $data);

                if ($this->Cinemas->save($cinema)) {
                    $this->Flash->success(__('The cinema has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('The cinema could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('cinema'));
        $this->set('_serialize', ['cinema']);
    }

    public function halls($cinemaId = null)
    {
        $this->loadModel('Halls');
        $halls = $this->Halls->getHallsByCinemaId($cinemaId);

        $this->set(compact('halls'));
    }
}
