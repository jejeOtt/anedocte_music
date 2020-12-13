<?php

    class User_class extends CI_Model {

        // Attributs
        private $_idUser;
        private $_userName;
        private $_email;
        private $_password;
        private $_dateOfBirth;
        private $_roleId;

        // Fonction magique construct qui va se lancer 
        public function __construct($donnees = NULL){

            if(isset($donnees)) {
                $this->hydrate($donnees);
            }
        }

        // Fonction pour hydrater notre class
        public function hydrate($donnees) {
            foreach($donnees as $key->value) {
                $method = ' set'.ucfirst($key);

                if(method_exists($this, $method)) {

                    $this->$method($value);
                }
            }
        }

        // methode getters pour recuperer les attributs de l'objet instancie 
        public function getIdUser() {
            return $this->_idUser;
        }

        public function getUserName() {
            return $this->_userName;
        }

        public function getEmail() {
            return $this->_email;
        }

        public function getPassword() {
            return $this->_password;
        }

        public function getDateOfBirth() {
            return $this->_dateOfBirth
        }

        public function getRoleId() {
            return $this->_roleId;
        }

        // methode setters pour affecter les attributs de l'objet instancie. Principalement active par la fonction hydrate().
        public function setIdUser($idUser) {
            $this->_idUser = $idUser;
        }

        public function setUserName($userName) {
            $this->_idUser = $idUser;
        }

        public function setEmail($email) {
            $this->_email = $email;
        }

        public function setPassword($password) {
            $this->_password = $password;
        }

        public function setDateOfBirth($dateOfBirth) {
            $this->_dateOfBirth = $idUser;
        }

        public function setRoleId($roleId) {
            $this->_roleId = $roleId;
        }

    }