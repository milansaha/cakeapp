<?php

class UsersController extends AppController
{

    public $name = 'Users';
    public $uses = array('User', 'Group');
    public $helpers = array('Form', 'Html', 'Js', 'Time');
    public $components = array('Email');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('logout', 'signup', 'signin','adduser', 'verify', 'forgotpass');

        $loggedUserId = $this->Auth->user('id');
        $userProfileInfo = $this->User->find('first', array('recursive' => -1, 'conditions' => array('id' => $loggedUserId)));
        $this->set(compact('userProfileInfo'));

    }

    public function beforeRender()
    {
        parent::beforeRender();
       
    }

    public function initDB()
    {
        $group = $this->User->Group;
        // Admin: Will have access to Everything.
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        //Writers: Will have access to Game, News, Preview, Review, Feature, Blog.
        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        //site area
        $this->Acl->allow($group, 'controllers/Pages');
        $this->Acl->allow($group, 'controllers/News');
        $this->Acl->allow($group, 'controllers/Previews');
        $this->Acl->allow($group, 'controllers/Reviews');
        $this->Acl->allow($group, 'controllers/Blogs');
        $this->Acl->allow($group, 'controllers/Features');
        $this->Acl->allow($group, 'controllers/Games');
        

        echo "all done";
        exit;
    }

   

    function index()
    { 
        $this->User->recursive = 1;
        $this->set('users', $this->paginate());
         
    }

    function view($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    function add()
    {
        if (!empty($this->data)) {
            $this->User->create();
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    function edit($id = null)
    {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    function signup()
    {

    }

    function adduser()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $err = "";
            $dob = strtotime($this->data['User']['bmonth'] . '/' . $this->data['User']['bday'] . '/' . $this->data['User']['byear']);
            //print_r($this->data);die;

            $prev_email = $this->User->find('count', array(
                'conditions' => array("email='" . $this->data['User']['email'] . "'")));
            if ($prev_email > 0) {
                $err = 'Email address already exists.';
            }

            $prev_name = $this->User->find('count', array(
                'conditions' => array("username='" . $this->data['User']['username'] . "'")));
            if ($prev_name > 0) {
                $err = 'Username already exists.';
            }

            $pos = strpos($this->data['User']['username'], ' ');
            if ($pos) {
                $err = 'Spaces in the username is not allowed.';
            }


            if (strlen($this->data['User']['username']) > 10 || strlen($this->data['User']['username']) < 3) {
                $err = 'User name must be between 3 to 10 characters.';
            }

            if ($err == "") {
                $this->request->data['User']['password'] = md5($this->data['User']['password']);
                $this->request->data['User']['dob'] = $dob;
                $this->request->data['User']['status'] = 'User';
                $this->request->data['User']['group_id'] = '4';
                $this->request->data['User']['activation_key'] = uniqid() . uniqid();

                $this->User->create();
                if ($this->User->save($this->data)) {
                    $userId = $this->User->getLastInsertId();
                    
                    //Sending email
                    $User = $this->User->read(null, $userId);
                    $to = $this->data['User']['email'];
                    $subject = 'Thanks for signing up ' . $this->data['User']['username'];
                    $this->Email->to = $to;
                    $this->Email->bcc = array('henry@koreconx.com');
                    $this->Email->subject = $subject;
                    $this->Email->from = 'koreconx.com <admin@koreconx.com>';
                    $this->Email->template = 'signup';
                    $this->Email->sendAs = 'html';
                    $this->set('User', $User);
                    //$this->Email->delivery = 'debug';
                    $this->Email->send();
                    //End of email
                    echo 'successfully saved';
                }
            } else {
                echo $err;
            }

        }
    }

    public function verify($key = null)
    {
        $user = $this->User->find('first', array('recursive' => -1,
            'conditions' => array('activation_key' => $key)
        ));
        if ($user !== false) {
            $data = array('id' => $user['User']['id'], 'activated' => 1);
            $this->User->save($data);
            $verified = true;
            $this->set(compact('verified'));
            $msg = 'Your account has been verified. Cheers!';
            $this->set(compact('msg'));
        } else {
            $msg = 'Wrong Activation info.Please contact admin@koreconx.com';
            $this->set(compact('msg'));
        }
    }


    public function signin()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $username = $this->data['User']['username'];
            $password = Security::hash($this->data['User']['password'], 'md5', false);

            $user = $this->User->find('first', array('recursive' => -1,
                'conditions' => array('username' => $username,
                    'password' => $password, 'activated' => 1)
            ));
            if ($user !== false) {
                $userId = $user['User']['id'];
                $last_login = date("d M, Y");
                $this->User->query("UPDATE users SET last_login='" . $last_login . "' WHERE id=" . $userId);

                $this->Auth->login($user['User']);
                echo 'welcome';
            } else {
                echo 'Wrong username or password.';
            }
        } else {
            $this->redirect('/', null, false);
        }
    }


    public function login()
    {
        $this->redirect('/', null, false);
        if ($this->Session->read('Auth.User')) {
            $this->Session->setFlash('You are logged in!');
            $this->redirect('/', null, false);
        }
    }

   

    public function logout()
    {
        $this->Auth->logout();
        //$this->redirect($this->Auth->logout());
        $this->redirect('/', null, false);
    }


}

