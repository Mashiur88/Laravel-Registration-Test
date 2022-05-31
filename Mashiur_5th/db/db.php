<?php
class DB
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "user";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
//        echo "Connected successfully";
    }

    private function join($table, $join) {
        $cls = $table;

        if (!empty($join)) {
            foreach ($join as $k => $set) {
                $cls .= ' ' . $set['type'] . ' ' . $set['joining_table'] . ' ON ' . $set['j_pivot'] . '=' . $set['m_pivot'];
            }
        }
        return $cls;
    }
    
    private function where($where) 
    {
        $cls = '';
        $i = 0;
        if (!empty($where)) {
            foreach ($where as $k => $set) {
                $connector = ($i < sizeof($where) - 1) ?  $set['logopt'] : '';
                $cls .=' '. $set['col'] . ' '. $set['opt'] .' '. $set['val'] .' '. $connector;
                $i++;
            }
        }

        return !empty($cls) ? " WHERE " . $cls : '';
    }
    
    private function limit($limit) {
        return (!empty($limit) && !empty($limit[0])) ? " LIMIT " . $limit[0] . (!empty($limit[1]) ? ' OFFSET ' . $limit[1] : '') . ' ' : '';
    }
    
    
    

    
    public function delete($table,$condition) 
    {
        $condition = !empty($condition) ? $this->where($condition) : '';
        $sql = "DELETE FROM `" . $table . "` $condition";
        //echo $sql;
        $result = $this->conn->query($sql);
        return $result;
    }
    
    public function insert($table,$columns,$values)
    {
        $columns = !empty($columns) ? implode(',', $columns) : '*';
        $values = !empty($values) ? implode(',', $values) : '';
        $sql = "INSERT INTO ".$table." (".$columns." )
        VALUES ( ".$values.")";
        //echo $sql;
        $feedback = $this->conn->query($sql);
        var_dump($feedback);
        return $feedback;
    }
    
    public function select($columns,$table,$join,$condition,$limit,$orderby)
    {
        $sql = "";
        $columns = !empty($columns) ? implode(',', $columns) : '*';


        $condition = !empty($condition) ? $this->where($condition) : '';
        $limit = !empty($limit) ? $this->limit($limit) : '';

        $table = !empty($table) ? (!empty($join) ? $this->join($table, $join) : $table) : '';
        
        
        
        
        //echo $columns;
        $sql = "SELECT ".$columns." FROM ".$table." ".$condition." ".$limit." ".$orderby;
        //echo $sql;
        $y = $this->conn->query($sql);
        
        //$z = $y->fetch_assoc();
        //$y = 
        //print_r($sql);exit;
       
        //print_r($y);
        //var_dump($y);
        return $y;  
    }
    public function update($table,$set,$condition)
    {
        $str="";
        $condition = !empty($condition) ? $this->where($condition) : '';
        foreach($set as $key => $value)
        {
            $str .= " $key = '$value',";
        }
        $str = rtrim($str,',');
        $sql = "UPDATE ".$table." SET".$str." ".$condition;
        echo $sql;
        $feedback = $this->conn->query($sql);
        return $feedback;
    }
    
    

}

?>