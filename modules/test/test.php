<?php

	/*
	 *	Aruna Development Project
	 *	IS NOT FREE SOFTWARE
	 *	Codename: Aruna Personal Site
	 *	Source: Based on Sosiaku Social Networking Software
	 *	Website: https://www.sosiaku.gq
	 *	Website: https://www.aruna-dev.id
	 *	Created and developed by Andhika Adhitia N
	 */

defined('MODULEPATH') OR exit('No direct script access allowed');

class test {

	protected $ext;

	protected $output;

	protected $security;

	protected $input;

	protected $csrf;

	protected $db;

	protected $db2;
	
	public function __construct() 
	{
		$this->ext = load_ext(['url']);

		$this->output = load_lib('output');

		$this->security = load_lib('security');

		$this->input = load_lib('input');

		$this->db = load_db('default', 'MySQL');

		// $this->db2 = load_db('default2', 'SQLSRV');

		// Active CSRF Protection
		$this->security->set_csrf(1);

		// Create variable array CSRF to get CSRF token name and CSRF Hash
		$this->csrf = [
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		];
	}

	public function index()
	{
		section_content('
		<!-- Custom CSS -->
		<link rel="stylesheet" href="'.base_url('assets/css/default-homepage.css').'">

		<div class="container d-flex align-items-center vh-100 my-4 my-lg-0">
			<div>
				<div class="ar-default-homepage bg-white shadow mb-3">
					<div class="row">
						<div class="col-lg-8 order-2 order-lg-1 d-flex align-items-center text-center">
							<div>
								<h3 class="mb-3">Welcome to Aruna Development Project</h3>
								<p class="mb-4 mb-md-5">The page you are looking at is being generated dynamically by Aruna Development Project.</p>
								<h4>Thanks for using my Framework !! <i class="far fa-smile ml-1"></i></h4>
							</div>
						</div>

						<div class="col-lg-4 mb-5 mb-lg-0 order-1 order-lg-2 text-center">
							<img src="'.base_url('assets/images/super_thankyou.svg').'" class="img-fluid">
						</div>
					</div>
				</div>

				<div class="row text-white">
					<div class="col-lg-6 col-md-6 text-center text-md-left mb-3 mb-md-0">
						Made with <i class="fas fa-heart mx-1"></i> & <i class="fas fa-coffee mx-1"></i> in Jakarta, Indonesian.
					</div>

					<div class="col-lg-6 col-md-6 text-center text-md-right">
						Created & Developed by <a href="https://www.instagram.com/andhika_adhitia" target="_blank" class="text-white font-weight-bold"><u>Andhika Adhitia N</u></a>
					</div>
				</div>
			</div>
		</div>');
	}

	public function hy()
	{
		$response = array('status' => 'OK');

		$this->output
		->set_status_header(200)
		->set_header('X-Frame-Options: Deny');
		//->set_content_type('application/json', 'utf-8')
		//->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
		//->_display();

		echo $this->output->get_header('X-Frame-Options');

		// exit;
		// echo get_output()->get_header('X-Frame-Options');
	}

	public function form()
	{
		if ($this->input->post('step') && $this->input->post('step') == 'post')
		{
			section_content($_POST['fullname']);
		}

		section_content('
		<form action="'.site_url('test/form').'" method="post" class="container my-5 border rounded p-4">
			<input type="text" name="fullname" class="form-control">

			<input type="hidden" name="step" value="post">
			<input type="hidden" name="'.$this->csrf['name'].'" value="'.$this->csrf['hash'].'">
			<input type="submit" class="btn btn-primary" value="Submit">
		</form>');
	}

	public function update()
	{
		$data1 = [
			'id' 		=> 1,
			'fullname'  => 'Arunika Swastamitha',
			'status'	=> 0
		];

		$data2 = [
			'id' 		=> '1',
			'fullname'  => 'Aruna',
			'status'	=> '1'
		];

		$data3  = [
			'username' => 'rindu',
			'fullname' => 'Semidang Rindu',
			'status'   => '1'
		];

		// $this->db->sql_insert($data3, 'ar_accounts');

		// $this->db->sql_update($data1, "ar_accounts", ['fullname'  => 'Arunika Swastamitha']);

		$query = 'select * from ar_accounts order by id asc';
		$res = $this->db->sql_prepare($query, "select");
		while ($row = $this->db->sql_fetch_array($res))
		{
			section_content($row['id'].' => '.$row['fullname'].'<br/>');
		}

		$res2 = $this->db->sql_prepare("SELECT COLLATION('ar_accounts')", "select");
		$row2 = $this->db->sql_fetch_array($res2, PDO::FETCH_NUM);

		echo $row2[0];
	}

	public function display()
	{
		$username = 'rajolangit';
		$password = 'rajolangit1234';
		$email	  = 'rajolangit@gmail.com';
		
		$res = $this->db2->sql_prepare("INSERT INTO ar_accounts (username, password, email) VALUES ((CONVERT(binary, '".$username."')), (CONVERT (binary, '".$password."')), '".$email."')", "select");

		/*
		$res = $this->db2->sql_prepare("select * from ar_accounts where id = CONVERT(binary, 1)", "select");
		while ($row = $this->db2->sql_fetch_array($res))
		{
			section_content($row['id'].' => '.$row['email'].' => '.$row['username'].' => '.$row['fullname'].'<br/>');
		}
		*/

		$res = $this->db2->sql_prepare("select * from ar_accounts order by id asc", "select");
		while ($row = $this->db2->sql_fetch_array($res))
		{
			section_content($row['id'].' => '.$row['email'].' => '.$row['username'].' => '.$row['fullname'].'<br/>');
		}

		/*
		$res2 = $this->db2->sql_prepare("SELECT SERVERPROPERTY('Collation')", "select");
		$row2 = $this->db2->sql_fetch_array($res2, PDO::FETCH_NUM);

		echo $row2[0];
		*/
	}

	public function test2()
	{
		$array1 = ['id' => 1, 'status' => 0, 'username' => 'aruna'];
		$array2 = ['asd' => 1];
		$target = NULL;

		if (array_equal($array2, $array1))
		{
			echo 'equal => ';

			$result = array_intersect_key($array2, $array1);

			foreach ($result as $key => $value) 
			{
				$keym = $key.'2';
				$target .= $target ? " and $key = :$keym" : "$key = :$keym";
			}
		}
		else
		{
			echo 'not equal => ';
		}

		print_r($target);

		/*
		for ($i = 0; $i < 1; $i ++) 
		{
			$get_key[$i] = isset($get_key[$i]) ? $get_key[$i] : NULL;
			$get_value[$i] = isset($get_value[$i]) ? $get_value[$i] : NULL;
		}
		*/

		// echo $get_key[0].' => '.$get_value[0];

		/*
		if (array_equal($array1, $array2))
		{
			echo 'equal';
		}
		else
		{
			echo 'not equal';
		}

		if (is_array($array1) && is_array($array2) && count($array1) == count($array2) && array_diff($array1, $array2) === array_diff($array2, $array1))
		{

		}
		*/
	}

	public function total()
	{
		$total = $this->db->num_rows('ar_accounts', 'total', ['username' => 'malika']);
		$total2 = $this->db->num_rows('ar_accounts', NULL, ['username' => 'andhika2']);

		echo $total['total'];
		echo $total2;

		//echo $this->db->num_rows('ar_accounts', NULL, ['username' => 'malika']);
		//echo $this->db->num_rows('ar_accounts', 'total');
	}

	public function form2()
	{
		if ($this->input->post('step') && $this->input->post('step') == 'post')
		{
			$json = file_get_contents('php://input');

			$explode = explode("&", $json);

			foreach ($explode as $key => $value)
			{
				list($name, $values) = explode('=', $value);
				$name				 = trim($name);
				$values				 = trim($values);
			}

				if ($name == 'csrf_test_name')
				{
					//echo $values.' asd';

					$_POST[$name];

					echo $_POST['csrf_test_name'];
				}
				else
				{
					echo $name;
				}
		}

		section_content('
		<div class="container my-5">
			<form action="'.site_url('test/form2').'" method="post">
				<input type="text" name="email" class="form-control mb-3">
				<input type="text" name="username" class="form-control mb-3">
				<input type="text" name="fullname" class="form-control mb-3">

				<input type="hidden" name="step" value="post">
				<input type="hidden" name="csrf_test_name" value="kwkwk">
				<input type="submit" class="btn btn-primary" value="Submit">
			</form>
		</div>');
	}

	public function hello()
	{
		$data['title'] = "My Real Title";
		$data['heading'] = "My Real Heading";
		$data['data'] = ['andhika', 'pitaloka', 'aruna', 'gumara'];

		if ($_GET['req'] == 'ok')
		{
			echo "True";
		}
		else
		{
			echo "Fail";
		}

		return view('asd', $data);
	}

	public function transaction()
	{
		$data = [
			// 'id'		=> 1,
			'email' 	=> 'gumara456@aruna-dev.id',
			'username'	=> 'gumara_peto_alam_asd',
		];

		$data2 = [
			// 'id'		=> 1,
			'email' 	=> 'gumarajdnd31123123338@aruna-dev.id',
			'username'	=> 'gumara_peto_alam_asd',
		];

		// $this->db->sql_insert($data, 'ar_accounts');
		
		//$this->db->disableTransaction();
		$this->db->sql_insert($data2, 'ar_accounts', TRUE);
		// $this->db->transRollback();
		//$this->db->transCommit();
		// $this->db->runTransaction();

		// $res = $this->db->sql_prepare();
		// $bindParam = $this->db->sql_bindparam([], $res);


		/*
		$this->db->startTransaction(); 
		// $this->db->sql_prepare("INSERT INTO ar_accounts (username, email) VALUES ('gumara_peto_alam_asd', 'gumara101112@aruna-dev.id')", "select");
		$this->db->sql_prepare("INSERT INTO ar_accounts (username, email) VALUES ('gumara_peto_alam_qwe', 'gumara131417@aruna-dev.id')", "select");
		
		echo $this->db->transStatus();

		if ($this->db->transStatus() == FALSE)
		{
			$this->db->transRollback();	
		}
		else
		{
			$this->db->transCommit();
		}
		*/

	}

	public function transaction_rollback()
	{
		$this->db->transRollback();
	}
}

function array_equal2($a, $b) {
    return (
         is_array($a) 
         && is_array($b) 
         && count($a) == count($b) 
         && array_diff($a, $b) === array_diff($b, $a)
    );
}

function array_equal($a, $b)
{
	if (array_intersect_key($a, $b)) 
	{
		return true;
	}
	else
	{
		return false;
	}
}

?>