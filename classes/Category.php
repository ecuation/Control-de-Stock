<?php

/**
*updated to pdo
*/

class Category
{	
	private static $instance;

	private $idLanguage;

	private function __construct()
	{
		$this->idLanguage = _ID_LANG_;
	}	

	public static function getInstance()
	{
		if(!isset(self::$instance))
			self::$instance = new Category();

		return self::$instance;
	}

	public function getCategories()
	{
		$db = PDOQuery::getInstance();
		$db->connect();


		$sql = "SELECT category_lang.category_name, category_color.color, category.id_category
				FROM 	category_lang
			INNER JOIN	category_color USING (id_category)
				LEFT JOIN 	category USING (id_category)
			WHERE 		category.is_active = 1
				AND			category_lang.id_lang = ?";

		$stmt = $db->prepareQuery($sql);
		$stmt->execute(array($this->idLanguage));
		$db->close();
		
		return $stmt;
	}

	public function getRelatedCategories($id_parent_category)
	{
		$db = PDOQuery::getInstance();
		$db->connect();

		$sql = "SELECT id_children_category
			FROM	category_relations
				WHERE id_parent_category=?";

		$stmt = $db->prepareQuery($sql);
		$stmt->execute(array($id_parent_category));

		$db->close();
		
		return $stmt;
	}


	public function isCategoryActive($id_category)
	{
		$db = PDOQuery::getInstance();
		$db->connect();

		$sql="SELECT id_category
		FROM 	category
			WHERE	id_category = :id_category
			AND 	is_active = 1";

		$stmt = $db->prepareQuery($sql);
		$stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
		$stmt->execute();
		$db->close();
		
		if($stmt->rowCount() > 0)
			return true;
		
		return false;

	}

	public static function getCategoryName()
	{
		if( (isset($_GET['id_category'])) && (is_numeric($_GET['id_category'])))
		{
			$db = PDOQuery::getInstance();
			$db->connect();
			$id_category = intval($_GET['id_category']);

			$sql = "SELECT category_name as category
					FROM 	category_lang
					WHERE id_category=:id_category
					AND id_lang="._ID_LANG_;
			$stmt = $db->prepareQuery($sql);
			$stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);
			$stmt->execute();
			$db->close();

			return $db->next_row($stmt)['category'];
		}

		return false;
	}
}

?>