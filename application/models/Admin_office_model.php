<?php
    class Admin_office_model extends CI_Model {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_users_list() {
            $this->db->select('idUser, userName, email, roleId');
            $query = $this->db->get('users');

            return $query->result_array();
        }  

        public function get_user_detail($idUser) {
            $this->db->select('idUser, userName, email, roleId');
            $query = $this->db->get_where('users', array('idUser' => $idUser));

            return $query->row_array();
        }

        public function update_role_user() {
            $data = array(
                'roleId' => $this->input->post('roleId')
            );
            $this->db->where('idUser', $this->input->post('idUser'));

            return $this->db->update('users', $data);
        }

        public function delete_user($idUser) {
            // Suppresion de l'utilisateur
            $this->db->where('idUser', $idUser);
            $this->db->delete('users');

            return true;
        }
    }