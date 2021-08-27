<?php

class Member
{
    //会員のデータ
    public $value = [
        'name' => '',
        'kana' => '',
        'email' => '',
        'password' => '',
        'tel' => '',
        // 'year' => 1980,
        'birthday_at' => '1980/01/01',
        'gender' => 'male',
    ];

    //エラー情報
    public $errors = [];

    /**
     * データバインド（$value に一括設定）
     */
    public function bind($posts)
    {
        //データがなかったら処理しない
        if (empty($posts)) return;
        // $value のキー（カラム）をループして値を取得
        foreach (array_keys($this->value) as $column) {
            $this->value[$column] = $posts[$column];
        }
    }

    //バリデート
    public function validate()
    {
        //エラーメッセージの初期化（配列）
        $this->errors = [];
        if (empty($this->value['name'])) {
            $this->errors['name'] = "氏名を入力してください";
        }
        if (empty($this->value['email'])) {
            $this->errors['email'] = "Emailを入力してください";
        }
        //その他未入力チェックをする
        //...

        //電話番号のチェック
        if (!preg_match('/^[0-9]{10,12}$/', $this->value['tel'])) {
            $this->errors['tel'] = "電話番号はハイフンなしで入力してください";
        }
        //パスワードのチェック
        if (!preg_match('/^[a-zA-Z0-9_@]{6,20}$/', $this->value['password'])) {
            $this->errors['password'] = "パスワードは6文字以上20文字以内の半角英数（_ @ 含む）で入力してください";
        }
        //その他入力チェックをする
        //...
        return $this->errors;
    }

    public function get()
    {
        $sql = "SELECT * FROM {$this->table_name}";
        $db = new DB();
        return $db->fetchRows($sql);
    }

    public function insert($posts)
    {
        $posts['password'] = password_hash($posts['password'], PASSWORD_BCRYPT);
        $sql = "INSERT INTO users ('name', 'email', 'password', 'gender') 
                VALUES (:name, :email, :password, :gender)";

        $db = new DB();
        return $db->query($sql, $posts);
    }
}
