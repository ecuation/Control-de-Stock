<?php
/**
** ACTUALIZADO Y OPTIMIZADO EL 01-09-14**
*/
class AuthController
{
	/**
	 *@var singleton
	*/
	protected static $instance;

	private function __construct(){}

	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new AuthController;

		return self::$instance;
	}

	/**
 	 * returns user name if is logged or returns false if is not
 	*/
	public static function getUserName()
	{

		if(isset($_SESSION['userKey']))
		{
			$key = $_SESSION['userKey'];
			$db = PDOQuery::getInstance();
			$db->connect();

			$sql = "SELECT name 
						FROM user
					WHERE user_key = ?";

			$stmt = $db->prepareQuery($sql);
			$stmt->execute(array($key));

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$db->close();

			return $row['name'];


		}

		return false;
	}

	/**
	 *@ return false if user is not logged and return 1 if user is logged
	*/
	public static function isLogged()
	{
		if(isset($_SESSION['userKey']))
		{
			$db = PDOQuery::getInstance();
			$db->connect();

			$sql = "SELECT name 
						FROM user
					WHERE 	user_key = ? ";
			$stmt = $db->prepareQuery($sql);
			$stmt->execute(array($_SESSION['userKey']));

			if($stmt->rowCount() > 0)
				return true;
		}
		return false;
	}

	public static function isAdmin()
	{
		if(isset($_SESSION['userKey']))
		{
			$db = PDOQuery::getInstance();
			$db->connect();

			$sql = "SELECT name 
						FROM user
					WHERE is_admin = 1
					AND 	user_key = ?";

			$stmt = $db->prepareQuery($sql);

			$stmt->execute(array($_SESSION['userKey']));

			if($stmt->rowCount() > 0)
				return true;
		}
		return false;
	}

	public static function requireAdmin()
	{
		if(!self::isAdmin())
		{
			header('Location: ../shop_selection.php');
			return false;
		}
		return true;
	}


	public static function requireLogin()
	{
		if(!self::isLogged())
		{
			header('Location: index.php');
			return false;
		}
		return true;
	}


	public static function requireShopSession()
	{
		if(!isset($_SESSION['id_shop'])){
			if(defined('_ADMIN_DIR_')){
				header('Location: ../shop_selection.php?errorMessage=shopNotSelected');
				exit();
			}

			header('Location: shop_selection.php?errorMessage=shopNotSelected');
			exit();
		}
			

		return false;
	}

	public static function setShopSession()
	{
		$id_shop = $_GET['id_shop'];
		if( (isset($_GET['id_shop'])) || (empty($id_shop)) || (!is_numeric($id_shop)) ){
			SessionController::getInstance()->setSessionVar('id_shop', $_GET['id_shop']);
			return true;
		}

		return false;
	}


	public function unlogUser()
	{
		$this->context->session->destroy_session();
		header('Location: index.php');
		exit();
	}


	/**
	 *@ login form initializer
	*/
	public function loginUser()
	{
		$form = FormAccessValidator::getInstance();
		$form->addValidation('password','password',array('min_length'=>5));
		$form->addValidation('email','email','email');

		if((isset($_POST['submit'])) && ($form->init()))
		{
			if(self::getUserConnection())
				return true;

			return false;
		}

		self::setError($form->getErrors());
		return false;
	}



	public function getUserConnection()
	{
		if(self::getUser())
			return true;

		self::setError(array('user_error'));
		return false;
	}



	public function setError(array $errorsCollection)
	{
		$this->context->smarty->assign('authentication_errors', $errorsCollection);
	}

	public function getUser()
	{
		$db = PDOQuery::getInstance();
		$db->connect();

		$email = trim($_POST['email']);
		$password = sha1($_POST['password']);

		$sql = "SELECT  user_key, is_admin, id_lang, id_user
					FROM user
				WHERE email =?
				AND password =?";

		$stmt = $db->prepareQuery($sql);
		$stmt->execute(array($email, $password));
		$stmt->execute();

		if($stmt->rowCount() > 0)
		{
			$row = $db->next_row($stmt);
			$this->context->session->setSessionVar('userKey', $row['user_key']);
			$this->context->session->setSessionVar('is_admin', $row['is_admin']);
			$this->context->session->setSessionVar('id_lang', $row['id_lang']);
			$this->context->session->setSessionVar('id_employee', $row['id_user']);
			header("Location: shop_selection.php");
			exit();
		}

		return false;
	}
}