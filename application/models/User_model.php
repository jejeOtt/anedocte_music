<?php

    class User_model extends CI_Model {

        // Fonction pour mettre un utilisateur en base de données
        public function register($enc_password) {
            // Array des données utilisateurs
            $data = array(
				'userName' => $this->input->post('userName'),
				'email' => $this->input->post('email'),
                'password' => $enc_password,
                'roleId' => 3
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
                //return $result->row(0)->idUser;
                $row = $result->row_array();
                return $row;
            } else {
                return false;
            }
        }
        
        // Fonction pour récupérer les genres crées par un utilisateur
        public function get_created_genres($limit, $start, $idUser) {
            $array = array('idUser' => $idUser,);
            $query = $this->db->get_where('genres',$array, $limit, $start);
            return $query->result_array();
        }

        // Fonction pour récupérer les tracks crées par un utilisateur
        public function get_created_tracks($limit, $start, $idUser) {
            $array = array('idUser' => $idUser,);
            $query = $this->db->get_where('tracks',$array, $limit, $start);
            return $query->result_array();
        }

        // Fonction pour update son profil
        public function update_profil($userName, $email, $idUser) {
            // Array des données utilisateurs
            $data = array(
				'userName' => $userName,
				'email' => $email,
			);

            // Update l'utilisateur en base de donnée
            $this->db->where('idUser', $idUser);
            $this->db->update('users', $data);
            
            return true;
        }
    }