<?php
    class Post_model extends CI_Model {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_posts($slug = FALSE){
            if($slug === FALSE){
            $query = $this->db->get('posts');
            return $query->result_array();
            }
            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_post(){
            $slug = url_title($this->input->post('tracks'));
            $data = array(
                'tracks' => $this->input->post('tracks'),
                'slug' => $slug,
                'url' => $this->intput->post('url')
            );

            return $this->db->insert('posts', $data);
        }
        public function delete_post($id){
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }
    }