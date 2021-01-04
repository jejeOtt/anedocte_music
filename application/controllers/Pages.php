<?php
class Pages extends CI_Controller
{
    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        /*
        $url = 'https://binaryjazz.us/wp-json/genrenator/v1/genre/100';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $datajson = curl_exec($curl);
        $datasearch = json_decode($datajson, true);
        if (!empty($datasearch)) {

            foreach ($datasearch as $genreName) {
                $this->API_model->get_API(false, $genreName);
            }
        }
        else 
        {
            echo "Data not fetched.";
        }
        curl_close($curl);
        */
        $data['title'] = ucfirst($page);

        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }
}
