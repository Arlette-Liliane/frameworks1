<?php
class Admins extends CI_Controller
{
	public function board_admins()
	{
        $this->lang->load('header', $this->config->item('language'));

		$this->load->model("AdminsModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["admins"] = $this->AdminsModel->get_all_admin();
		$this->load->view("admins/board-admins",$data);
		$this->load->view("main/footer");
	}

	public function ajax_delete_admin()
	{
		if ($this->input->post("id"))
		{
			$this->load->model("AdminsModel");
			$this->AdminsModel->delete_admin($this->input->post("id"));
		}
	}

	public function board_categories()
	{
        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('forum', $this->config->item('language'));
		$this->load->model("CategoriesModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["categories"] = $this->CategoriesModel->get_all_category();
		$this->load->view("admins/board-categories",$data);
		$this->load->view("main/footer");
	}

	public function ajax_delete_category()
	{
        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('forum', $this->config->item('language'));
		if ($this->input->post("id"))
		{
			$this->load->model("CategoriesModel");
			$this->CategoriesModel->delete_category($this->input->post("id"));
		}
	}

	public function add_category()
	{
        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('forum', $this->config->item('language'));
		$this->load->model("CategoriesModel");
		if ($this->input->post("name"))
		{
			$data = array(
				"name" => $this->input->post("name"),
				"type" => 1
			);
			$this->CategoriesModel->insert_category($data);
			redirect("admins/board_categories");
		}
	}

	public function board_souscategories()
	{
        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('forum', $this->config->item('language'));
		$this->load->model("SouscategoriesModel");
		$this->load->model("CategoriesModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["categories"] = $this->CategoriesModel->get_all_category();
		$data["souscategories"] = $this->SouscategoriesModel->get_all_souscategory();
		$this->load->view("admins/board-souscategories",$data);
		$this->load->view("main/footer");
	}

	public function ajax_delete_souscategory()
	{
        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('forum', $this->config->item('language'));
		if ($this->input->post("id"))
		{
			$this->load->model("SouscategoriesModel");
			$this->SouscategoriesModel->delete_souscategory($this->input->post("id"));
		}
	}

	public function add_souscategory()
	{
        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('forum', $this->config->item('language'));
		$this->load->model("SouscategoriesModel");
		if ($this->input->post("name"))
		{
			if ($this->input->post("categories") != "nochoice")
			{
				$data = array(
					"name" => $this->input->post("name"),
					"id_categories" => $this->input->post("categories")
				);
				$this->SouscategoriesModel->insert_souscategory($data);
				redirect("admins/board_souscategories");
			}
			else
				redirect("admins/board_souscategories");
		}
		else
			redirect("admins/board_souscategories");
	}




	public function change_date($old_date)
	{
        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('forum', $this->config->item('language'));
		$split =  split('/', $old_date);
		$temp = $split[0];
		$temp2 = $split[1];
		$split[0] = $split[2];
		$split[1] = $temp;
		$split[2] = $temp2;
		$new_date = join('-', $split);
		return $new_date;
	}


	public function board_tickets()
	{

        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('ticket', $this->config->item('language'));
		$this->load->model('TicketsModel');
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		$data["tickets"] = $this->TicketsModel->get_all_ticket();
		$this->load->view('admins/board-tickets', $data);
		$this->load->view("main/footer");
	}

	public function assign_tickets()
	{

        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('ticket', $this->config->item('language'));
		$this->load->model('TicketsModel');
		$this->load->model("AdminsModel");
		$this->load->view("main/header");
		$this->load->view("admins/board-menu");
		if ($this->input->post("uid_admins"))
		{
			$data = array(
				"uid_admins" => $this->input->post("uid_admins")
			);
			$this->TicketsModel->edit_assign($data, $this->input->post("id"));
			redirect("admins/board_tickets");
		}
		else
		{
			$data["admins"] = $this->AdminsModel->get_all_admin();
			$data["id"] = $_GET["id"];
			$this->load->view('admins/board-assign-tickets', $data);
		}
		$this->load->view("main/footer");
	}

	public function close_tickets()
	{
        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('ticket', $this->config->item('language'));
		$this->load->model('TicketsModel');
		if ($_GET["id"])
		{
			$data = array(
				"etat" => 1
			);
			$this->TicketsModel->open_or_close($data, $_GET["id"]);
		}
		redirect("admins/board_tickets");
	}

	public function open_tickets()
	{
        $this->lang->load('header', $this->config->item('language'));
        $this->lang->load('ticket', $this->config->item('language'));
		$this->load->model('TicketsModel');
		if ($_GET["id"])
		{
			$data = array(
				"etat" => 0
			);
			$this->TicketsModel->open_or_close($data, $_GET["id"]);
		}
		redirect("admins/board_tickets");
	}


}
?>