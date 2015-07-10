<?php

class FilesController extends AppController {

    var $name = 'Files';
    var $uses = array('File', 'User');
    var $paginate = array('limit' => 20, 'order' => array('File.id ASC'));

    

    function index() {
       
    }
    
    function upload() {
        // pr($this->data);   die;
        if (!empty($this->data)) {
            //file upload
            if (isset($this->data['File']['info'])) {
                $destination = WWW_ROOT . "files" . DS;
                $file = $this->data['File']['info'];
                $result = $this->Upload->upload($file, $destination, $this->data['File']['info']['name']);
                //pr($result);
                //die;
                //end upload                
                if (!$result) {
                    $this->data['File']['name'] = $this->data['File']['info']['name'];
                    $user = $this->Session->read('Auth.User'); // pr($user); die;                  
                    $this->data['File']['user_id'] = $user['id'];
                } else {
                    $errorss = $this->Upload->errors;
                    if (is_array($errorss)) {
                        $errorss = implode("<br />", $errorss);
                    }
                    $this->Session->setFlash($errorss);
                    $this->redirect('/img/files');
                    exit();
                }
            }
            //end upload
            //photo upload
            if (isset($this->data['File']['image'])) {
                $destination = WWW_ROOT . "img" . DS . "files" . DS;
                $file = $this->data['File']['image'];
                $result = $this->Upload->upload($file, $destination, $this->data['File']['image']['name'], array('type' => 'resizecrop', 'size' => array('250', '150'), 'output' => null));
                //pr($result);
                //die;					
                if (!$result) {
                    //$this->data['File']['image'] = $this->Upload->result;
                    $this->data['File']['image'] = $this->data['File']['image']['name'];
                } else {
                    $errorss = $this->Upload->errors;
                    if (is_array($errorss)) {
                        $errorss = implode("<br />", $errorss);
                    }
                    $this->Session->setFlash($errorss);
                    $this->redirect('/img/files');
                    exit();
                }
            }
            //end photo
            $this->File->create();
            if ($this->File->save($this->data)) {
                $this->Session->setFlash(__('The file has been saved', true));
                $this->redirect(array('controller' => 'fronts', 'action' => 'home'));
            } else {
                $this->Session->setFlash(__('The file could not be saved. Please, try again.', true));
            }
        }

//        $cats = $this->Staticselect->CategorySelect('list');
//        $this->set(compact('cats'));
    }

   

    function delete($id = null) {

        if (!$id) {
            $this->Session->setFlash(__('Invalid id for file', true));
            $this->redirect(array('action' => 'lists'));
        }
        if ($this->File->delete($id)) {
            $this->Session->setFlash(__('File deleted', true));
            $this->redirect(array('action' => 'lists'));
        }
        $this->Session->setFlash(__('File was not deleted', true));
        $this->redirect(array('action' => 'lists'));
    }

    

}

?>
