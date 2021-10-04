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

use chriskacerguis\RestServer\RestController;

class api extends RestController
{
	protected $ext;

	protected $db;

	protected $uri;

	protected $formv;

	// Accounts data for login model emulation
	protected $accounts = 
	[
		'admin'	=>	'password',
		'user'	=>	'password2',
		'demo'	=>	'password3',
	];
	
	public function __construct() 
	{
		// Construct the parent class
		parent::__construct();

		$this->ext = load_ext(['url']);

		$this->db = load_db('default', 'MySQL');

		$this->uri = load_lib('uri');

		$this->formv = load_lib('form_validation');

		// Set limit request per method
		$this->methods['users_get']['limit'] = 10;
		$this->methods['users_post']['limit'] = 100;

		// Setup URI String and Segment to active Limit
		$this->_remap($this->uri->uri_string(), $this->uri->get_segment());
	}

	public function index()
	{
		return view('index');
	}

	//User JWT authentication to get the toekn
	public function token_post()
	{
		$this->formv->set_data([
			'username' => $this->post('username'),
			'password' => $this->post('password'),
		]);

		$this->formv->set_rules('username', 'Username', 'required');
		$this->formv->set_rules('password', 'Password', 'required');

		if ($this->formv->run() == TRUE)
		{
			if ($this->login($this->post('username'), $this->post('password')))
			{
				$token['username'] = $this->post('username');
				$date = new DateTime();
				$token['iat'] = $date->getTimestamp();
				$token['exp'] = $date->getTimestamp() + $this->config->item('jwt_token_expire');
				$output_data['token'] = $this->jwt_encode($token);
				$this->response($output_data, REST_Controller::HTTP_OK);
			}
			else
			{
				$output_data[$this->config->item('rest_status_field_name')] = "invalid_credentials";
				$output_data[$this->config->item('rest_message_field_name')] = "Invalid username or password!";
				$this->response($output_data, REST_Controller::HTTP_UNAUTHORIZED);
			}
		}
		else
		{
			$output_data[$this->config->item('rest_status_field_name')] = "empty_fields";
			$output_data[$this->config->item('rest_message_field_name')] = $this->formv->error_array();

			$this->response($output_data, REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
		}
	}

	public function users_get($id)
	{
		// Users from a data store e.g. database
		$users = 
		[
			['id' => 1, 'name' => 'John', 'email' => 'john@example.com'],
			['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com'],
			['id' => 3, 'name' => 'Elsa', 'email' => 'elsa@example.com'],
			['id' => 4, 'name' => 'Gumara', 'email' => 'gumara@example.com'],
		];

		// $id = $this->get('id');

		if (empty($id))
		{
			// Check if the users data store contains users
			if ($users)
			{
				// Set the response and exit
				$this->response($users, 200);
			}
			else
			{
				// Set the response and exit
				$this->response(
				[
					'status' => false,
					'message' => 'No users were found'
				], 404);
			}
		}
		else
		{
			/*
			if (array_key_exists($id, $users))
			{
				// $this->response($users[$id], 200);

				foreach ($users as $key => $value) 
				{
					if ($value['id'] == $id)
					{
						$this->response($value, 200);
					}
				}
			}
			else
			{
				$this->response(
				[
					'status' => false,
					'message' => 'No such user found with ID '.$id
				], 404);
			}
			*/

			$key = array_search($id, array_column($users, 'id'));
			$getUser = array_column($users, 'id', 'id');

			if (isset($getUser[$id]))
			{
				foreach ($users as $key => $value) 
				{
					if ($value['id'] == $id)
					{
						$this->response($value, 200);
					}
				}
			}
			else
			{
				$this->response(
				[
					'status' => false,
					'message' => 'No such user found'
				], 404);
			}
		}
	}

	public function users_post()
	{
		$this->formv->set_error_delimiters('', '');

		$this->formv->set_data(
		[
			'id' 		=> $this->post('id'),
			'username'	=> $this->post('username'),
			'fullname'	=> $this->post('fullname')
		]);

		$this->formv->set_rules('id', 'ID', 'required|integer');
		$this->formv->set_rules('username', 'Username', 'required|trim');
		$this->formv->set_rules('fullname', 'Fullname', 'required');

		if ($this->formv->run() == FALSE)
		{
			$this->response(
			[
				'status' 	=> 202,
				'message' 	=> $this->formv->error_array(),
				'data'		=> ''
			], 202);
		}
		else
		{
			$this->response(
			[
				'status' 	=> 200,
				'data'		=> 
				[
					'id' 		=> $this->post('id'),
					'username' 	=> $this->post('username'),
					'fullname' 	=> $this->post('fullname')
				]
			], 200);
		}

		/*
		if ((int) $this->post('id'))
		{
			$this->response($this->post('id'), 200);
		}
		elseif ( ! is_int($this->post('id')))
		{
			$this->response(
			[
				'status' => false,
				'message' => 'Parameter ID is not integer'
			], 404);
		}
		elseif (empty($this->post('id')))
		{
			$this->response(
			[
				'status' => false,
				'message' => 'Parameter ID is empty'
			], 404);
		}
		*/
	}

	public function getAllScore_get()
	{
		$res = $this->db->sql_prepare("select avg(score) as avg_score from ml_report", "select");
		$row = $this->db->sql_fetch_array($res);

		$this->response(
		[
			'status' 	=> 200,
			'data'		=> 
			[
				$row
			]
		], 200);
	}

	public function getTopHighest_get()
	{
		$res = $this->db->sql_prepare("select avg(r.score) as avg_score, s.student_id, s.name, s.grade from ml_students as s left join ml_report as r on r.student_id = s.student_id where r.grade = s.grade group by s.name order by avg_score desc limit 3", "select");
		while ($row = $this->db->sql_fetch_array($res))
		{
			$output[] = $row;
		}

		$this->response(
		[
			'status' 	=> 200,
			'data'		=> 
			[
				$output
			]
		], 200);
	}

	public function getBelowAverage_get()
	{
		$res = $this->db->sql_prepare("select avg(r.score) as avg_score, s.student_id, s.name, s.grade from ml_students as s left join ml_report as r on r.student_id = s.student_id where r.grade = s.grade group by s.name order by avg_score asc limit 1", "select");
		while ($row = $this->db->sql_fetch_array($res))
		{
			$output[] = $row;
		}

		$this->response(
		[
			'status' 	=> 200,
			'data'		=> 
			[
				$output
			]
		], 200);
	}
}

?>