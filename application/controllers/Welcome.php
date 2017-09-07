<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('vue_connexion');
	}
	public function creer_utilisateur(){
		$this->form_validation->set_rules('username', 'Nom d utilisateur', 'required');
		$this->form_validation->set_rules('typeuser', 'Type d utilisateur', 'required');
		$this->form_validation->set_rules('password', 'Mot de passe', 'required');
		$this->form_validation->set_rules('password_confirm', 'Confirmation mot de passe ', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('vue_creer_compte');
		}else{
			$username = $this->input->post('username');
			$password = sha1($this->input->post('password'));
			$password_confirm = sha1($this->input->post('password_confirm'));
		
			
			if(strcmp($password, $password_confirm) == 0){
				$typeuser = $this->input->post('typeuser');
				$data =  array('user_name'=> $username, 'user_type'=> $typeuser, 'user_password'=>$password, 'user_status'=>0);
				 
				
				$this->db->insert('user', $data);
				$this->index();
			}else{
				$this->load->view('vue_creer_compte');
			}
			
		}
		
	}
	
	
	public function connexion()
	{
		$this->form_validation->set_rules('username', 'Nom d utilisateur', 'required');

		$this->form_validation->set_rules('password', 'Mot de passe', 'required');

		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$username = $this->input->post('username');
			$password = sha1($this->input->post('password'));
			$data =  array('user_name'=> $username, 'user_password'=>$password, 'user_type'=>1);
			$this->db->where($data);
			$query = $this->db->get('user');
			$login = $query->result_array() ;
			if(!empty($login)){
				
				$this->db->where('user_type !=',1);
				$query = $this->db->get('user');
				$users = $query->result_array() ;
				if(!empty($users)){
						$data['users'] = $users;
				}
				
				$this->db->where(array('party_status'=>1));
				$query = $this->db->get('party');
				$parties = $query->result_array();
				foreach($parties as$key=> $party){
					$this->db->where(array('party_voted_id'=>$party['party_id']));
					$query = $this->db->get('user');
					$voters = $query->result_array();
					if(empty($voters)){
						$n = 0;
						$parties[$key]['voters'] = $n;
					}else{
						$n = count($voters);
						$parties[$key]['voters'] = $n;
					}
				}
				$data['parties'] = $parties;
				$this->load->view('vue_admin', $data);
			}else{
				$data =  array('user_name'=> $username, 'user_password'=>$password, 'user_status'=>0);
				$this->db->where($data);
				$query = $this->db->get('user');
				$login = $query->result_array();
				if(!empty($login)){
					
					$this->db->where(array('party_status'=>1));
					$query = $this->db->get('party');
					$parties = $query->result_array();
					$data['partis'] = $parties;
					$data['user_id'] = $login[0]['user_id'];
					$this->load->view('vue_electeur',$data);
				}else{
					$this->index();	
				}
				
			}
		}
		
		
	}
	public function creer_parti(){
		
		$this->form_validation->set_rules('party_name', 'Nom du Parti', 'required');
		$this->form_validation->set_rules('party_head', 'Nom du Pr.', 'required');
		if($this->form_validation->run() == FALSE){
			$this->db->where('user_type !=',1);
			$query = $this->db->get('user');
			$users = $query->result_array() ;
			if(!empty($users)){
					$data['users'] = $users;
					$this->load->view('vue_admin', $data);
			}else{
				$this->load->view('vue_admin');
			}
			
		}else{
			$party_name = $this->input->post('party_name');
			$party_head = $this->input->post('party_head');
			$party_logo = $this->input->post('party_logo');
			$data = array('party_name'=>$party_name, 'party_logo'=>$party_logo, 'party_status'=>$party_head);
			
			$this->db->insert('party', $data);
			////////////////////////////////////////
			
			$this->db->where('party_status', $party_head);
			$query = $this->db->get('party');
			$party = $query->result_array() ;
			
			
			////////////////////////////////////////
			
			$update = array('user_party_id'=>$party[0]['party_id']);
			$this->db->where('user_id', $party[0]['party_status']);
			$this->db->update('user', $update);
			
			$update2 = array('party_status'=>1);
			$this->db->where('party_id',$party[0]['party_id']);
			$this->db->update('party', $update2);
			
			$this->db->where('user_type !=',1);
			$query = $this->db->get('user');
			$users = $query->result_array() ;
			if(!empty($users)){
					$data['users'] = $users;
			}
			$this->load->view('vue_admin', $data);
			
		}
	}
	
	public function resultat_vote()
	{
		$this->load->view('vue_connexion');
	}
	
	public function choix_candidat()
	{
		$this->load->view('vue_connexion');
	}
	
	public function voter()
	{
		$this->form_validation->set_rules('party', 'Parti', 'required');
		$this->form_validation->set_rules('voter', 'Electeur', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('vue_connexion');
		}else{
			$party_id = $this->input->post('party');
			$voter_id = $this->input->post('voter');
			
			$update = array('user_status'=>1, 'party_voted_id'=>$party_id);
			$this->db->where('user_id',$voter_id);
			$this->db->update('user', $update);
			$this->load->view('vue_connexion');
		}
		
	}
}
