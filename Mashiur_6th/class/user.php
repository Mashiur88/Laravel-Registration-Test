<?php

include "../db/db.php";

class User {

    private $connect2;

    public function __construct() {
        $this->connect2 = new DB();
    }
    public function changeStat($set,$id)
    {
        $table = "userlist";
        $condition = [
                [
                'col' => 'id',
                'val' => "$id",
                'opt' => '=',
                'logopt' => ''
                ]
            ];
        $result = $this->connect2->update($table,$set,$condition);
        //echo $result;
        return $result;
    }
    public function getThana($id)
    {
        $table = "thana";
        $columns = [];
        $conditions = [
                [
                'col' => 'district_id',
                'val' => "$id",
                'opt' => '=',
                'logopt' => ''
                ]
            ];
        $thana = $this->connect2->select($columns,$table,"",$conditions,"","");
        return $thana;
    }
    
    public function getDistrict($id)
    {
        $table = "district";
        $columns = [];
        $conditions = [
                [
                'col' => 'division_id',
                'val' => "$id",
                'opt' => '=',
                'logopt' => ''
                ]
            ];
        $districts = $this->connect2->select($columns,$table,"",$conditions,"","");
        return $districts;
    }
    public function getAddress($id)
    {
        $table = "userlist";
        $columns = ['userlist.address as address','division.name as division','district.name as district','thana.name as thana'];
        $conditions = [
                [
                'col' => 'userlist.id',
                'val' => "$id",
                'opt' => '=',
                'logopt' => ''
                ]
            ];
        $join = 
        [
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
            ]
        ];
        $address = $this->connect2->select($columns,$table,$join,$conditions,"","");
        return $address;
        //return ['address' => $address];
    }
    public function getDivision()
    {
        $table= "division";
        $result = $this->connect2->select("",$table,"","","","");
        return $result;
    }
    public function insertData($values)
    {
        $table="userlist";
        $columns = ['first_name', 'last_name', 'user_name', 'password', 'address', 'gender', 'division', 'district', 'thana','status'];
        //print_r($values);
        $feedback = $this->connect2->insert($table,$columns,$values);
        return $feedback;
    }
    
    public function userData($id)
    {
        $table="userlist";
        $columns = ['userlist.*','division.id as divId','division.name as division','district.id as dId','district.name as district','thana.id as tId','thana.name as thana'];
        $conditions = [
                [
                'col' => 'userlist.id',
                'val' => "$id",
                'opt' => '=',
                'logopt' => ''
                ]
            ];
        $join = 
        [
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
            ]
        ];
        $person = $this->connect2->select($columns,$table,$join,$conditions,"","");
        return $person;
    }
    
    public function updateData($id,$set)
    {
          $table = "userlist";
          $condition = [
                [
                'col' => 'id',
                'val' => "$id",
                'opt' => '=',
                'logopt' => ''
                ]
              ];
              
          //$set = "first_name='$fname', last_name='$lname', address='$address', gender='$gender', status='$status', division=$division, district=$district, thana=$thana";
          $result = $this->connect2->update($table,$set,$condition);
          return $result;
    }

    public function login($name,$pass) 
    {
        $table = "userlist";
        $columns = ['user_name','password']; 
        $condition = [
                [
                'col' => 'user_name',
                'val' => "'$name'",
                'opt' => '=',
                'logopt' => 'AND'
                ],
            
                [ 
                'col' => 'password',
                'val' => "'$pass'",
                'opt' => '=',
                'logopt' => ''
                ]
        ];
         $result = $this->connect2->select($columns,$table,"",$condition,"","");
         //print_r($result);exit;
         return $result;
    }

    public function delete($id) {
        $table = "userlist";
        $conditions = [
                ['col' => 'id',
                'val' => "'$id'",
                'opt' => '=',
                'logopt' => '']
        ];
        $result = $this->connect2->delete($table, $conditions);
        return $result;
    }

    public function userlist() {
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

        if (!empty($rowCount)) {
            foreach ($rowCount as $row) {
                $rows = $row["rows"];
            }
        }

        $pageCount = ceil($rows / $limit);

        $offset = ($pageno - 1) * $limit;


        if (isset($_POST['find'])) {
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
            $columns = ['userlist.*', 'division.id as divId', 'division.name as division', 'district.id as dId', 'district.name as district', 'thana.id as tId', 'thana.name as thana'];
            $lim = [$limit, $offset];
            $result = $this->connect2->select($columns, $table, $join, $conditions, $lim, "");
        } elseif (isset($offset)) {
            $columns = ['userlist.*', 'division.id as divId', 'division.name as division', 'district.id as dId', 'district.name as district', 'thana.id as tId', 'thana.name as thana'];
            $lim = [$limit, $offset];
            //print_r($sql2);
            $result = $this->connect2->select($columns, $table, $join, "", $lim, "");
            //print_r($result);
            //header('Location: userlist.php');
        } else {
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