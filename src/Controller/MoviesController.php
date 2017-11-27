<?php
namespace App\Controller;

/**
 * Movies Controller
 *
 *
 * @method \App\Model\Entity\Movie[] paginate($object = null, array $settings = [])
 */
class MoviesController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($hallId = null)
    {
        $movie = $this->Movies->newEntity();

        if ($this->request->is('post')) {
            $movie = $this->Movies->patchEntity($movie, $this->request->getData());
            $movie->hall_id = $hallId;

            if ($this->Movies->save($movie)) {
                $this->Flash->success(__('The movie has been saved.'));

                return $this->redirect(['controller' => 'Halls', 'action'=> 'movies', $hallId]);
            }
            $this->Flash->error(__('The movie could not be saved. Please, try again.'));
        }
        $this->set(compact('movie'));
        $this->set('_serialize', ['movie']);
    }

    public function book($hallId = null, $movieId = null)
    {
        $this->set('hallId', $hallId);
        $this->set('movieId', $movieId);

        $this->loadModel('Halls');
        $hall = $this->Halls->find()
            ->where(['id' => $hallId])
            ->first();

        $this->set('hall', $hall);

        $this->loadModel('Bookings');
        $bookings = $this->Bookings->getBookings($hallId, $movieId);

        $this->set('bookings', $bookings);
    }

    public function update($hallId, $movieId)
    {
        if ($this->request->is('Ajax'))
        {
            $this->autoRender = false;
            $this->layout = 'ajax';

            $this->loadModel('Bookings');
            $bookings = $this->Bookings->getBookings($hallId, $movieId);

            $bookingsArray = [];
            foreach ($bookings as $booking) {
                $bookingsArray[] = [
                    'id' => $booking->id,
                    'row' => $booking->row_number,
                    'seat' => $booking->seat_number,
                    'inactive' => $booking->inactive,
                ];
            }

            echo json_encode(['bookings' => $bookingsArray]);
        }
    }
}
