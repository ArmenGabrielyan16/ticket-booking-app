<?php
namespace App\Controller;

/**
 * Halls Controller
 *
 *
 * @method \App\Model\Entity\Hall[] paginate($object = null, array $settings = [])
 */
class HallsController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($cinemaId = null)
    {
        $hall = $this->Halls->newEntity();
        if ($this->request->is('post')) {
            $hall = $this->Halls->patchEntity($hall, $this->request->getData());
            $hall->cinema_id = $cinemaId;

            if ($this->Halls->save($hall)) {
                $this->Flash->success(__('The hall has been saved.'));

                return $this->redirect(['controller' => 'Cinemas', 'action'=> 'halls', $cinemaId]);
            }
            $this->Flash->error(__('The hall could not be saved. Please, try again.'));
        }

        $this->set('cinemaId', $cinemaId);

        $this->set(compact('hall'));
        $this->set('_serialize', ['hall']);
    }

    public function movies($hallId = null)
    {
        $this->loadModel('Movies');
        $movies = $this->Movies->getMoviesByHallId($hallId);

        $this->set(compact('movies'));
    }
}
