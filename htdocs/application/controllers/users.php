<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function index()
	{
        if ($this->session->userdata("uid"))
        {

        	redirect("users/account");
        }
        else
        {
        	$this->signin();
        }
	}

	public function signin()
	{
        $this->lang->load('users', $this->config->item('language'));
        $this->lang->load('header', $this->config->item('language'));

        $this->load->view("main/header");
		$this->load->model("AdminsModel");
		$this->form_validation->set_rules('uid','uid','trim|required|xss_clean');
		$this->form_validation->set_rules('password','password','trim|required|xss_clean');

		if ($this->form_validation->run())
		{

			if ($this->session->userdata("uid") && $this->session->userdata("admin"))
			{

				if ($this->ldap->is_valid_user($this->input->post("uid"), $this->input->post("password")))
				{
					$this->session->set_userdata(array("olduid" => $this->session->userdata("uid"), "uid" => $this->input->post("uid")));
					if (!($this->AdminsModel->is_admin($this->input->post("uid"))))
						$this->session->unset_userdata('admin');
					redirect("users/account");
				}
				else
                   redirect("users/signin");
			}
			else
			{

				if ($this->ldap->is_valid_user($this->input->post("uid"), $this->input->post("password")))
				{

					if ($this->AdminsModel->is_admin($this->input->post("uid")))
						$data = array('uid' => $this->input->post('uid'), 'admin' => true);
					else
						$data = array('uid' => $this->input->post('uid'));
					$this->session->set_userdata($data);
					$this->LogsModel->log(1, "users/signin", "Signin", $this->session->userdata("uid"));
					redirect("users/account");
				}
				else
                    redirect("users/signin");
			}
		}
		else

			$this->load->view("users/connexion");
		$this->load->view("main/footer");
	}

	public function logout()
	{
        $this->lang->load('header', $this->config->item('language'));
		if ($this->session->userdata("olduid"))
		{
			$this->session->set_userdata(array("uid" => $this->session->userdata("olduid"), "admin" => true));
			$this->session->unset_userdata('olduid');
			redirect("/users");
		}
		elseif ($this->session->userdata("uid"))
		{
			$this->LogsModel->log(1, "users/logout", "logout", $this->session->userdata("uid"));
			$this->session->unset_userdata('uid');
			$this->session->sess_destroy();
			redirect("/users");
		}
	}
//taper vore code postal, 1 min plus tard madame cest pr une commande? wi patienter 3 minutes votre numero de tel, votre adresses et votre nom c'est la premiere fois que vous commander? wi vous avez l'appoint ? car on ne prend pas de carte bleux juste exspece, cheque .. jai paye en espece mais
//pas d'appoint vous avez combien 50 euro ...dici 45 minutes madames bonne soireeau revoir. 18h08
	public function account()
	{
		if (!$this->session->userdata("uid"))
		{

			$this->signin();
		}
        $this->lang->load('users', $this->config->item('language'));
        $this->lang->load('header', $this->config->item('language'));

		$this->load->model("modulesmodel");
		$this->load->model("activitiesmodel");
		if (!($this->session->userdata("uid")))
			redirect("/");
		$this->load->view("main/header");

		if (isset($_GET["uid"]))
		{
			$data["logs"] = $this->LogsModel->get_logs_uid($_GET["uid"]);
			$data["user"] = $this->ldap->get_user_uid($_GET["uid"]);
			$this->LogsModel->log(1, "users/account?uid=".$_GET["uid"], "other_account", $this->session->userdata("uid"));
		}
		elseif ($this->session->userdata("uid"))
		{

			$data["logs"] = $this->LogsModel->get_logs_uid($this->session->userdata("uid"));
			$data["user"] = $this->ldap->get_user_uid($this->session->userdata("uid"));
			$this->LogsModel->log(1, "users/account", "my_account", $this->session->userdata("uid"));
		}
		$this->load->view("users/account",$data);
		$this->load->view("main/footer");
	}



	public function ajax_switch_to_admin()
	{
		if ($this->input->post("uid"))
		{
			$this->load->model("AdminsModel");
			if (!($this->AdminsModel->is_admin($this->input->post("uid"))))
			{
				$data = array("uid" => $this->input->post("uid"));
				$this->AdminsModel->insert_admin($data);
				?>
				<span id="message-switch-to-admin-ok">Cet utilisateur est désormais admin.</span>
				<?php
			}
			else
			{
				?>
				<span id="message-switch-to-admin-error">Cet utilisateur est déjà admin.</span>
				<?php
			}
		}
	}


}

?>
