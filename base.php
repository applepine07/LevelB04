<?php
session_start();
date_default_timezone_set('Asia/Taipei');

class DB{
    private $dsn="mysql:host=localhost;charset=utf8;dbname=web04";
    private $pdo;
    public $table;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
        
    }

    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        switch(count($arg)){
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $val){
                        $tmp[]="`$key`='$val'";
                    }
                    $sql .= " WHERE " . implode(" && ",$tmp);
                }else{
                    $sql .= $arg[0];
                }
            break;
            case 2:
                foreach($arg[0] as $key => $val){
                    $tmp[]="`$key`='$val'";
                }
                $sql .= " WHERE " . implode(" && ",$tmp);
                $sql .= $arg[1];

            break;
        
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($id){
        $sql="SELECT * FROM $this->table ";

        if(is_array($id)){
            foreach($id as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            $sql .= " WHERE " . implode(" && ",$tmp);
        }else{
            $sql .= " WHERE `id`='$id'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function save($array){
        if(isset($array['id'])){
            foreach($array as $key => $val){
                $tmp[]="`$key`='$val'";
            }

            $sql="UPDATE $this->table SET ".implode(",",$tmp)." WHERE `id`='{$array['id']}'";

        }else{

            $sql="INSERT INTO $this->table (`".implode("`,`",array_keys($array))."`)";
            $sql .= " VALUES('".implode("','",$array)."')";

        }
        // echo $sql;
        return $this->pdo->exec($sql);

    }
    function del($id){
        $sql="DELETE FROM $this->table ";

        if(is_array($id)){
            foreach($id as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            $sql .= " WHERE " . implode(" && ",$tmp);
        }else{
            $sql .= " WHERE `id`='$id'";
        }

        return $this->pdo->exec($sql);
    }
    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function math($math,$col,...$arg){
        $sql="SELECT $math($col) FROM $this->table ";
        switch(count($arg)){
            case 1:
                if(is_array($arg[0])){
                    foreach($arg[0] as $key => $val){
                        $tmp[]="`$key`='$val'";
                    }
                    $sql .= " WHERE " . implode(" && ",$tmp);
                }else{
                    $sql .= $arg[0];
                }
            break;
            case 2:
                foreach($arg[0] as $key => $val){
                    $tmp[]="`$key`='$val'";
                }
                $sql .= " WHERE " . implode(" && ",$tmp);
                $sql .= $arg[1];

            break;
        
        }
        //echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }

}

function to($url){
    header("location:".$url);
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$Mem=new DB("member");
$Admin=new DB('admin');
$Bot=new DB('bottom');
$Ord=new DB('ord');
$Type=new DB('type');
$Goods=new DB('goods');

// $admin['acc']='admin';
// $admin['pw']='1234';
// $admin['pr']=serialize([1,2,3,4,5]);
// $Admin->save($admin); 
?>