<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Session\Session;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use App\Models\userInfo;
use App\Models\Station;
use Myth\Auth\Authorization\GroupModel;

class ExtrainfoController extends Controller
{
	protected $auth;

	/**
	 * @var AuthConfig
	 */
	protected $config;

	/**
	 * @var Session
	 */
	protected $session;

	public function __construct()
	{
		// Most services in this controller require
		// the session to be started - so fire it up!
		$this->session = service('session');

		$this->config = config('Auth');
		$this->auth = service('authentication');
		helper('url');
		helper("active");
		helper("user");
	}


	/**
	 * Displays the user registration page.
	 */
	public function register()
	{

		//$query   = $db->query('SELECT id, name FROM auth_groups ');
		//$results = $query->getResult();
		$results = new GroupModel();
		$results = $results->getGroups();
		$db = \Config\Database::connect();
		//$query   = $db->query('SELECT id, nomStation FROM station ');
		//$results2 = $query->getResult();
		$results2 = new Station();
		$results2 = $results2->getStations();
		$query = $db->query('SELECT o.id, p.nom,p.prenom,o.email,o.username,ag.name,o.active, st.nom as stnom 
                            FROM `user_info` p 
                            Right join `users` o on p.`users_id` = o.`id` 
                            left join `auth_groups_users` g on o.id = g.user_id 
                            left join `auth_groups` ag on g.group_id = ag.id 
                            left join `stations` st on p.station_id = st.id 
                            where o.deleted_at is NULL');
		$usersList = $query->getresult();
		return $this->_render($this->config->views['newuser'], ['config' => $this->config, 'results' => $results, 'results2' => $results2, 'usersList' => $usersList]);
	}

	/**
	 * Attempt to register a new user.
	 */
	public function attemptRegister()
	{

		// Check if registration is allowed
		if (!$this->config->allowRegistration) {
			return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
		}

		$users = model(UserModel::class);
		$userInfo = model(userInfo::class);


		// Validate basics first since some password rules rely on these fields
		$rules = [
			'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
			'email'    => 'required|valid_email|is_unique[users.email]',
			'firstname' => 'required|alpha_numeric_space|min_length[3]|max_length[30]',
			'lastname' => 'required|alpha_numeric_space|min_length[3]|max_length[30]',

		];

		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		// Validate passwords since they can only be validated properly here
		$rules = [
			'password'     => 'required|strong_password',
		];

		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
		}

		// Save the user
		$allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
		$user = new User($this->request->getPost($allowedPostFields));
		$this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

		// Check if the user was given a role
		// If yes, it returns the role 
		// If not, it returns the default role defaultUserGroup 
		if ($this->request->getVar('role') == "") {

			if (!empty($this->config->defaultUserGroup)) {
				$users = $users->withGroup($this->config->defaultUserGroup);
			}
		} else {
			$users = $users->withGroup($this->request->getVar('role'));
		}

		//creates new user in the table users 

		if (!$users->insert($user)) {
			return redirect()->back()->withInput()->with('errors', $users->errors());
		}

		$user_id = $users->getInsertID();

		//creates new user in the table user_info 

		$client = new userInfo();
		$data = array(
			'users_id' => $user_id,
			'prenom' => $this->request->getPost('firstname'),
			'nom' => $this->request->getPost('lastname'),
			'station_id' => $this->request->getPost('station'),
		);
		$client->insert($data);


		return redirect()->route('newuser')->with('message', lang('Auth.registerSuccess'));
	}



	/* 
	*	Delete User
	*/

	public function deleteUser($id)
	{
		$user = new UserModel();
		$data['post'] =  $user->where('id', $id)->delete();
		//echo var_dump($user);

		return redirect()->route('newuser')->with('message', lang('Auth.deletionSuccess'));
	}

	public function activateUser()
	{
		$id = $this->request->getPost('val');
		$users = model(UserModel::class);
		$user = $users->find($id);
		
		$user->activate();

		$users->save($user);
		//echo var_dump($user);

		return redirect()->route('newuser')->with('message', lang('Auth.userRoleUpdated'));
	}

	public function deactivateUser()
	{
		$users = model(UserModel::class);
		$id = $this->request->getPost('val2');
		$user = $users->find($id);
		$user->deactivate();

		$users->save($user);
		echo var_dump($user);
		//return redirect()->route('newuser')->with('message', lang('Auth.userRoleUpdated'));
	}

	/*
	*	Update user Role 
	*/

	public function getUser()
	{
		$user = $this->auth->user()->getRoles();
		echo json_encode($user['1']);
	}

	public function updateRole($id, $role)
	{
		$group = new GroupModel();
		$groupName = $group->getGroupName($role);
		$groupName = $groupName[0];
		$group->removeUserFromAllGroups($id);
		$group = $group->addUserToGroup($id, $role);
		return redirect()->route('newuser')->with('message', lang('Auth.userRoleUpdated', [$groupName["name"]]));
	}

	protected function _render(string $view, array $data = [])
	{
		return view($view, $data);
	}
}
