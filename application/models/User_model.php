<?php

    class User_model extends CI_Model {

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
            return $this->_dateOfBirth;
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


        // Fonction pour mettre un utilisateur en base de données
        public function register($enc_password) {
            // Array des données utilisateurs
            $data = array(
				'userName' => $this->input->post('userName'),
				'email' => $this->input->post('email'),
                'dateOfBirth' => $this->input->post('dateOfBirth'),
                'password' => $enc_password,
                'roleId' => 1
			);

			// Mets l'utilisateur en base de donnée
			return $this->db->insert('users', $data);
        }

        // vérifie sir le userName existe
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('userName' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		// Vérifie si l'email existe
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
        }
        
        // Fonction pour logger l'utilisateur
        public function login($username, $password) {
            // validation
            $this->db->where('userName', $username);
            $this->db->where('password', $password);

            // sélectionne la table 'user' de la bdd
            $result = $this->db->get('users');

            if($result->num_rows() == 1) {
                return $result->row(0)->idUser;
            } else {
                return false;
            }
        }
        

    }