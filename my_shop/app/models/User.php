<?php
require_once 'lib/DB.php';
require_once 'lib/Model.php';

class User extends Model
{
    public $value = [
        'id' => '',
        'created_at' => '',
        'updated_at' => '',
        'name' => '',
        'email' => '',
        'password' => '',
        'gender' => '',
    ];

    public $table_name = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function validate($posts)
    {
        $errors = [];
        if (empty($posts['name'])) {
            $errors['name'] = 'ユーザ名を入力してください';
        }
        if (empty($posts['email'])) {
            $errors['email'] = 'メールアドレスを入力してください';
        }
        return $errors;
    }

    public function auth($email, $password)
    {
        try {
            $db = new DB();
            $sql = "SELECT * FROM {$this->table_name} WHERE email = :email";
            $value = $db->fetch($sql, ['email' => $email]);
            if ($value && password_verify($password, $value['password'])) {
                $this->value = $value;
            }
        } catch (PDOException $e) {
            return;
        }
    }

    function all($limit = 10, $offset = 0)
    {
        $params = ['limit' => $limit, 'offset' => $offset];
        $sql = "SELECT * FROM users LIMIT :limit OFFSET :offset";

        $db = new DB();
        $stmt = $db->query($sql, $params);
        $rows = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rows[] = $row;
        }
        $this->values = $rows;
        return $this->values;
    }

    public function findById($id)
    {
        $db = new DB();
        $sql = "SELECT * FROM users WHERE id = :id";
        return $db->fetch($sql, ['id' => $id]);
    }

    public function count()
    {
        $db = new DB();
        $sql = "SELECT count(id) AS count FROM users";
        $row = $db->fetch($sql);
        return $row['count'];
    }

    public function update($id, $data)
    {
        $db = new DB();
        $data['id'] = $id;
        $sql = "UPDATE users SET 
                name = :name,
                email = :email,
                gender = :gender
                WHERE id = :id;";
        return $db->query($sql, $data);
    }
}
