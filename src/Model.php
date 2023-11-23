<?php

namespace MVC_DA1;

class Model
{
    protected $conn;
    protected $table;

    protected $columns;

    public function __construct()
    {
        try {
            $host = DB_HOST;
            $dbname = DB_DATABASE;
            $username = DB_USERNAME;
            $password = DB_PASSWORD;

            $this->conn = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function findOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }

    public function all($column = 'id')
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY {$column} DESC";

        $stmt = $this->conn->prepare($sql);


        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function paginate($page = 1, $perPage = 10)
    {
        $sql = "SELECT * FROM {$this->table} LIMIT {$perPage} OFFSET (({$page} - 1) * {$perPage})";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO {$this->table}";

        $columns = implode(", ", $this->columns);
        $sql .= "({$columns}) VALUES ";

        $values = [];
        foreach ($this->columns as $column) {
            $values[] = ":{$column}";
        }
        $values = implode(", ", $values);
        $sql .= "({$values})";



        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => &$value) {
            if (in_array($key, $this->columns)) {
                $stmt->bindParam(":{$key}", $value);
            }
        }

        $stmt->execute();
    }

    public function insertImages($id_product, $image_url)
    {
        $sql = "INSERT INTO products_images (`id_products`, `image_url`) 
        VALUES (:id_product, :image_url)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":id_product", $id_product, \PDO::PARAM_INT);

        $stmt->bindParam(":image_url", $image_url, \PDO::PARAM_STR);

        $stmt->execute();
    }

    /* 
        $data = [
            'collumn_name' => 'giá trị người dùng truyền vào',
        ];

        $conditions = [
            ['collumn_name', 'toán tử so sánh', 'giá trị người dùng truyền vào', 'AND hoặc OR'],
            ['collumn_name', 'toán tử so sánh', 'giá trị người dùng truyền vào']
        ];
    */
    public function update($data, $conditions = [])
    {
        $sql = "UPDATE {$this->table} SET ";

        $sets = [];
        foreach ($this->columns as $column) {
            $sets[] = "{$column} = :{$column}";
        }
        $sets = implode(", ", $sets);
        $sql .= "{$sets}";

        $where = [];
        foreach ($conditions as $condition) {
            $link = $condition[3] ?? '';
            $where[] = "{$condition[0]} {$condition[1]} :w{$condition[0]} {$link}";
        }
        $where = implode(" ", $where);
        $sql .= " WHERE {$where}";

        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => &$value) {
            if (in_array($key, $this->columns)) {
                $stmt->bindParam(":{$key}", $value);
            }
        }

        foreach ($conditions as &$condition) {
            $stmt->bindParam(":w{$condition[0]}", $condition[2]);
        }

        $stmt->execute();
    }

    public function delete($conditions = [])
    {
        $sql = "DELETE FROM {$this->table} WHERE ";

        $where = [];
        foreach ($conditions as $condition) {
            $link = $condition[3] ?? '';
            $where[] = "{$condition[0]} {$condition[1]} :w{$condition[0]} {$link}";
        }
        $where = implode(" ", $where);
        $sql .= "{$where}";

        $stmt = $this->conn->prepare($sql);

        foreach ($conditions as &$condition) {
            $stmt->bindParam(":w{$condition[0]}", $condition[2]);
        }

        $stmt->execute();
    }


    public function joinTable($addColumn = [], $connect = [],  $conditions = [], $orderBy = [])
    {
        $sql = "SELECT *";
        if (!empty($addColumn)) {
            $asColumn = [];
            foreach ($addColumn as $column) {
                $asColumn[] = " ,{$column[0]} as {$column[1]}";
            }
            $asColumn = implode(" ", $asColumn) . ' FROM ';
            $sql .= $asColumn;
        }


        $join = [];

        foreach ($connect as $key => $column) {
            if (empty($column[3])) {
                $join[] = "{$this->table} JOIN  {$column[0]}  ON {$column[1]} = {$column[2]}";
            } else {
                if ($key == 1) {
                    $join[] = "{$column[0]} ON {$column[2]} = {$column[3]}";
                }
                if ($key > 1) {
                    $join[] = " JOIN {$column[0]} ON {$column[2]} = {$column[3]}";
                }
                if ($key == 0) {
                    $join[] = "{$column[0]} JOIN {$column[1]} ON {$column[2]} = {$column[3]} JOIN ";
                }
            }
        }
        $from = !empty($addColumn) ? '' : ' FROM ';
        $join = $from . implode(" ", $join);
        $sql .= $join;

        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $value) {
                $link = $value[3] ?? '';
                $value[3] = $value[3] ?? '';
                $where[] = " WHERE {$value[0]} {$value[1]} {$value[2]} {$link}";
            }

            $where = implode(" ", $where);
            $sql .= $where;
        }

        if (!empty($orderBy)) {
            $addSql = [];
            foreach ($orderBy as $item) {
                $limit = empty($item[2]) ? "" : "LIMIT {$item[2]}";
                $addSql[] = " ORDER BY {$item[0]} {$item[1]} $limit";
            }

            $addSql = implode(" ", $addSql);
            $sql .= $addSql;
        }
        // echo '<pre>';
        // print_r($sql);
        // die;

        $stmt = $this->conn->prepare($sql);
        // foreach ($conditions as &$condition) {
        //     $stmt->bindParam("{$condition[0]}", $condition[2]);
        // }
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }



    public function categoryProduct($id, $addColumn = [], $connect = [], $conditions  = [])
    {
        /* 
        connect = [
            ['tên bảng', 'tên bảng.cột, 'tên bảng.cot']
        ]
        
        */
        $sql = "SELECT *";
        if (!empty($addColumn)) {
            $asColumn = [];
            foreach ($addColumn as $column) {
                $asColumn[] = " ,{$column[0]} AS {$column[1]}";
            }
            $asColumn = implode(" ", $asColumn) . ' FROM ';
            $sql .= $asColumn;
        }



        if (!empty($connect)) {
            $join = [];
            foreach ($connect as $conn) {
                $join[] = " {$conn[0]} JOIN {$conn[1]} ON {$conn[2]} = {$conn[3]}";
            }
            $join = implode(" ", $join);
        }
        $sql .= $join;


        $where = [];
        foreach ($conditions as $condition) {
            $where[] = "{$condition[0]} {$condition[1]} $id";
        }
        $where = ' WHERE ' . implode(" ", $where);

        $sql .= $where;

        // echo '<pre>';
        // print_r($sql);
        // die;


        $stmt = $this->conn->prepare($sql);

        // $stmt->bindParam("{$id}", $id);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function countProduct($id)
    {
        $sql = "SELECT COUNT(products.id) as products_count FROM products WHERE products.id_category = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function getLastId()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 1";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetch()['id'];
    }


    public function __destruct()
    {
        $this->conn = null;
    }
}
