<?php
require_once 'Model.php';

class Item extends Model
{
    public $pdo;

    function validate($data)
    {
        $errors = [];
        if (empty($data['code'])) $errors['code'] = '商品コードを入力してください。';
        if (empty($data['name'])) $errors['name'] = '商品名を入力してください。';
        if (empty($data['price'])) $errors['price'] = '価格を入力してください。';
        if ($data['stock'] < 0) $errors['stock'] = '在庫数を入力してください。';
        return $errors;
    }

    function all($limit = 20, $offset = 0)
    {
        $sql = "SELECT * FROM items LIMIT {$limit} OFFSET {$offset};";
        $this->values = $this->pdo->query($sql);
        return $this->values;
    }

    function findById($id)
    {
        $sql = "SELECT * FROM items WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $this->value = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->value;
    }

    function insert($data)
    {
        $sql = "INSERT INTO items (code, name, price, stock)
            VALUES (:code, :name, :price, :stock)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    function update($data)
    {
        $sql = "UPDATE items SET 
            code = :code,
            name = :name,
            price = :price,
            stock = :stock
            WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    function delete($id)
    {
        $sql = "DELETE FROM items WHERE id = :id;";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    //演習：商品コード重複チェック
    function findByCode()
    {
    }

    function search($params, $limit = 20, $offset = 0)
    {
        $sql = "SELECT * FROM items";
        $conditions = [];
        if ($params['keyword']) $conditions[] = "name LIKE '%{$params['keyword']}%'";
        if ($params['code']) $conditions[] = "code LIKE '%{$params['code']}%'";
        if ($conditions) {
            $condition = implode(' AND ', $conditions);
            $sql .= " WHERE {$condition}";
        }
        $sql .= " LIMIT {$limit} OFFSET {$offset};";
        $items = $this->pdo->query($sql);
        return $items;
    }
}
