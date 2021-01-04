<?php
class API_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_API($slug = FALSE, $genreName, $storyName)
    {

        $slug = url_title($genreName);
        $data = array(
            'genreName' => $genreName,
            'story' => $storyName,
            'idUser' => $this->session->userdata['idUser'],
            'isValidated' => 1,
            'slug' => $slug,
        );
        return $this->db->insert('genres', $data);
            


    }
}
