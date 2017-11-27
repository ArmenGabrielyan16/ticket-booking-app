<?php
namespace App\Controller;

use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    function beforeFilter(Event $event)
    {
        $this->Auth->allow('register');
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error('Your username or password is not correct.');
        }
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
        $this->Flash->success('You are now logged out.');

        return $this->redirect($this->Auth->logout());
    }

    /**
     * @return \Cake\Http\Response|null
     */
    public function register()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if (!empty($data['username']) && !empty($data['password']) && !empty($data['password_confirm'])) {
                if ($data['password'] === $data['password_confirm']) {
                    $user = $this->Users->patchEntity($user, $data);

                    if ($this->Users->save($user)) {
                        $this->Flash->success('You successfully registered.');

                        return $this->redirect(['action' => 'index']);
                    }

                    $this->Flash->error('You cannot register.');
                } else {
                    $this->Flash->error('Passwords do not match.');
                }
            } else {
                $this->Flash->error('Please, fill in all fields.');
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
}
