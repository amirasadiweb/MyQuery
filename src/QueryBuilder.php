<?php
namespace Query;
use MongoDB\Client;
use MongoDB\BSON\ObjectID;
class QueryBuilder
{
    private $db;
    private $collection;
   // private static $instance;

    /**
     * @return QueryBuilder
     */
//    public static function getInstance()
//    {
//        if (!isset(self::$instance)){
//            self::$instance = new self();
//        }
//        return self::$instance;
//
//    }


    /**
     * QueryBuilder constructor.
     * @param $dbname
     */
    public function __construct($dbname)
    {
        $this->db= new Client("mongodb://localhost:27017");
        $this->db=$this->db->$dbname;
        return $this->db;
    }

    /**
     * @param $collection
     * @return \MongoDB\Collection
     */

    public function selCollection($collection)
    {
        $this->collection=$this->db->$collection;
        return $this->collection;
    }

    /**
     * @param $list
     * $list is an array
     */

    public function show($list)
    {
        $result=$this->collection->find();
        foreach ($result as $value)
        {
            foreach ($list as $val)
            {
                echo "$val".' => '. $value[$val].',';
            }
            echo '</br>';
        }

    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $this->collection->deleteOne(['_id' => new ObjectID($id)]);
    }

    /**
     * @param $name
     * @param $company
     * @param $country
     * @param $email
     */

    public function insert($name,$company,$country,$email)
    {
        $this->collection->insertOne
        (
            [
                "name"=>$name,
                "company"=>$company,
                "country"=>$country,
                "email"=>$email
            ]

        );
    }

    /**
     * @param $id
     * @param $cloumn
     * @param $newValue
     */
    public function update($id,$cloumn,$newValue)
    {
        $this->collection->updateOne(['_id' => new ObjectID($id)],
            ['$set' => [$cloumn => $newValue]]);
    }


}