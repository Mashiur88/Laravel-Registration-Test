<?php

include "../db/db.php";

class User {

    private $connect2;

    public function __construct() 
    {
        $this->connect2 = new DB();
    }

    public function userlist() 
    {
        $table = 'userlist';
        $columns = ["COUNT(*) AS 'rows'"];

        $join = [
                [
                'type' => 'LEFT JOIN',
                'joining_table' => '`division`',
                'j_pivot' => 'userlist.division',
                'm_pivot' => 'division.id',
            ],
                [
                'type' => 'LEFT JOIN',
                'joining_table' => '`district`',
                'j_pivot' => 'userlist.district',
                'm_pivot' => 'district.id',
            ],
                [
                'type' => 'LEFT JOIN',
                'joining_table' => '`thana`',
                'j_pivot' => 'userlist.thana',
                'm_pivot' => 'thana.id',
            ],
        ];
        $groupBy = ['customer.name', 'customer.age'];
        $orderBy = [
                [
                'col' => 'name',
                'order' => 'asc',
            ],
                [
                'col' => 'date',
                'order' => 'desc',
            ],
        ];


        $result = [];

        $rowCount = $this->connect2->select($columns, $table, "", "", "", "");
        if (isset($_GET['pageno']) && isset($_GET['limit'])) {
            $pageno = $_GET['pageno'];
            $limit = $_GET['limit'];
        } else {
            $pageno = 1;
            $limit = 2;
        }

        if (isset($_POST['send'])) {
            $limit = $_POST['limit'];
            $pageno = 1;
        }

        if (!empty($rowCount)) 
        {
            foreach ($rowCount as $row) 
            {
                $rows = $row["rows"];
            }
        }

        $pageCount = ceil($rows / $limit);

        $offset = ($pageno - 1) * $limit;
        
        
        if (isset($_POST['find'])) 
        {
            $keyword = $_POST['search'];
            $conditions = [
                [
                'col' => 'first_name',
                'val' => "'%$keyword%'",
                'opt' => 'Like',
                'logopt' => 'OR'
            ],
                [
                'col' => 'last_name',
                'val' => "'%$keyword%'",
                'opt' => 'Like',
            ],
        ];
            $columns = ['userlist.*','division.id as divId','division.name as division','district.id as dId','district.name as district','thana.id as tId','thana.name as thana'];
            $lim = [$limit,$offset];
            $result = $this->connect2->select($columns, $table, $join, $conditions, $lim, "");
        } 
        elseif (isset($offset)) {
            $columns = ['userlist.*','division.id as divId','division.name as division','district.id as dId','district.name as district','thana.id as tId','thana.name as thana'];
            $lim = [$limit,$offset];
            //print_r($sql2);
            $result = $this->connect2->select($columns, $table, $join, "", $lim, "");
            //print_r($result);
            //header('Location: userlist.php');
        } else 
        {
            $columns = "";
            $result = $this->connect2->select($columns, $table, "", "", "", "");
        }
        
        
        return [ 
            'result' => $result,
            'pageCount' => $pageCount,
            'pageno' => $pageno,
            'limit' => $limit
              ];
    }
    

}
?>