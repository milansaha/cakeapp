<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    public $name = 'User';
    public $belongsTo = array('Group');
    public $actsAs = array('Acl' => array('type' => 'requester'));


    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

    public function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }
    public function beforeSave($options = array()) {
        //$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        //$this->data['User']['password'] = Security::hash($this->data['User']['password'], 'md5', false);
        //return true;
    }


}