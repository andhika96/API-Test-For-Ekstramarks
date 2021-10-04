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

class home 
{
	protected $ext;

	protected $db;

	protected $db1;

	protected $db2;

	protected $tests;
	
	public function __construct() 
	{
		$this->ext = load_ext(['url']);

		$this->db = load_db('default', 'MySQL');

		$this->tests = load_lib('Test');

		$this->uri = load_lib('uri');
	}

	public function index()
	{
		return view('index');
	}

	public function lop()
	{
		echo $this->uri->get_segment(1);
		exit;
	}

	public function hashed()
	{
		$bodyPayload = 
		[
			"vehicle_type"=> "Motorcycle",
			"box"=> false,
			"sender"=> 
			[
				"name"=> "wehelpyou",
				"phone"=> 6289532207210,
				"address"=> "Jl. Raya Ciburuy-Padalarang No.171, Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553, Indonesia",
				"latitude"=> -6.132252,
				"longitude"=> 106.686043,
				"notes"=> "sender notes"
			],
			"receiver"=> 
			[
				"name" => "wehelpyou",
				"phone"=> 6289532207210,
				"address"=> "Jl. Raya Ciburuy-Padalarang No.171, Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553, Indonesia",
				"latitude"=> -6.132256,
				"longitude"=> 106.686045,
				"notes"=> "sender notes"
			],
			"item_specification"=> 
			[
				"name"=> "name of goods",
				"item_description"=> "description of goods",
				"length"=> 1,
				"width"=> 1,
				"height"=> 1,
				"weight"=> 1,
				"remarks"=> "notes of goods"
			]
		];

		date_default_timezone_set('UTC');

		$date_utc = new \DateTime("now", new \DateTimeZone("UTC"));
		echo $date_utc->format('D, d M Y H:i:s T').'<br/><br/>';

		$signatureString = $date_utc->format('D, d M Y H:i:s T').'|'.json_encode($bodyPayload);

		$result = base64_encode(hash_hmac('sha256', $signatureString, 'secret', true));
		echo $result;
		exit;
	}

	public function gumara()
	{
		$object_called = 'api/users_get';
		$object_called = preg_replace('/_[A-Za-z0-9].+/s', '', $object_called);

		$split_object_called = preg_split("#/#", $object_called);
		$asd = end($split_object_called);

		echo $asd;
		exit;

	}

	public function test()
	{
		$result_object = array();

		$res = $this->db->sql_prepare("select * from ar_accounts order by id asc", "select");
		$row = $this->db->sql_result($res, 'object');

		header('Content-Type: application/json');
		echo json_encode($row, JSON_PRETTY_PRINT);
		exit;

		/*
		while ($row = $this->db->sql_fetch_array($res))
		{
			$result_object[] = $row;
		}

		print_r($result_object);

		foreach ($result_object as $key) 
		{
			echo $key['username'].'<br/>';
		}

		echo json_encode($result_object);
		*/

		// $data['db'] = $row;
		// return view('test', $data);
	}

	public function hy()
	{
		$data['title'] = 'Malika';

		return view('hy', $data);
	
		//call_user_func('oy');
	}

	public function hy2()
	{
		$this->oy('db2');
	}

	public function oy($key)
	{
		if ($key == 'db1')
		{
			$this->{$key} = 'asd';
			$out = $this->{$key};
		}
		elseif ($key == 'db2')
		{
			$this->{$key} = 'qwe';
			$out = $this->{$key};
		}

		echo $out;
	}

	public function yes()
	{
		$conn['db'] = [
			'type' 		=> 'MySQL',
			'charset'	=> 'utf8'
		];

		echo $conn['db']['charset'];
	}

	public function formt()
	{
		$formv = load_lib('form_validation');

		$formv->set_rules('email', 'Email', 'required|min_length[5]|valid_email');
		$formv->set_rules('username', 'Username', 'required|is_unique[default.ar_accounts.username]', 
				[
					'is_unique' => 'This %s already exists.'
				]);

		$formv->set_message('min_length', '{field} must have at least {param} characters.');

		if ($formv->run('signup') == FALSE)
		{
			print_r($formv->error_array()['email']);
		}
		else
		{
			section_content('qwe');
		}

		section_content('
		<div class="container my-5">
			<div class="bg-light p-4 border rounded shadow-sm">
				<form action="'.site_url('home/formt').'" method="post">
					<div class="form-group mb-3">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email" value="'.$formv->set_value('email', 'asd').'">
					</div>

					<div class="form-group mb-3">
						<label>Username</label>
						<input type="text" name="username" class="form-control" placeholder="Username">
					</div>

					<input type="submit" class="btn btn-primary" value="Submit">
				</form>
			</div>
		</div>');
	}

	public function time_start()
	{
		$asd = explode("/", $_REQUEST['p']);
		$asd[0] = 'asd';

		//echo $asd[0];
		
		$GLOBALS['segments'][2] = $asd[0];

		print_r($GLOBALS['segments']);
		exit;
	}
}

?>