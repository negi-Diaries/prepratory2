<?php

class querybuilder{
    protected $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function total_records($table_name){
        $statement = $this->pdo->prepare("select * from {$table_name}");
        $statement->execute();
        $total_records = $statement->rowCount();
        return $total_records;
    }

    public function selectAll($table_name,$limit,$offset){
        // $statement = $this->pdo->prepare("select * from {$table_name}  limit {$limit} offset {$offset}");
        $query = "SELECT * FROM bookdetails ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    // insert function starts 
    public function insert($table_name, $parameters, $side_effects){
        // take all the keys from the parameters array
        $key = array_keys($parameters);
        // converted all the key array to a string 
        $string_key = implode(", " ,$key);
        //  added a colon : in values so that we can bind values to it in execution
        $add_colon = array_map(function($param){
            return ":{$param}";
        }, $key);
        // implode function returns a string from an array 
        $param_values = implode(",", $add_colon);
        $str = sprintf('insert into %s (%s) values(%s)', $table_name, $string_key, $param_values );
        try{
            $statement = $this->pdo->prepare($str);
            $result = $statement->execute([
                ':img_source' => $parameters['img_source'],
                ':book_name' => $parameters['book_name'],
                ':author' => $parameters['author'],
                ':description' => $parameters['description'] 
            ]);
        }
        catch(Exception $e){
            die($e->getMessage());
            // header("location: error");
        }
        // insert photo in the images directory 
          if(isset($result)){
                move_uploaded_file($side_effects['tempname'], $side_effects['folder']);
            }
            return $result;
        }
        // insert section ends 

        //  readmore function starts
        public function single_data($id){
            $selectQuery = "select * from bookdetails where id = $id";
            $statement = $this->pdo->query($selectQuery);
          return $statement->fetch(); 
        }
        //  readmore function ends

        // delete query atarts
        public function delete($id){
            $deleteQuery = "DELETE FROM bookdetails WHERE id = :id";
           $stmt = $this->pdo->prepare($deleteQuery);
           $result = $stmt->execute([
            ':id' => $id
           ]);
           return $result;
        }
        // delete query ends

        //  update function starts
        public function update($table_name, $update_details){
             $updateQuery = "update bookdetails set img_source= :updated_image, book_name= :bookname, author= :author, description= :description where id = :id";
             echo "this is the update function <pre>";
             var_dump($table_name);
             print_r($update_details);
             $stmt = $this->pdo->prepare($updateQuery);
             $result  = $stmt->execute([
            ':updated_image' => $update_details['image_source'],
            ':bookname' => $update_details['book_name'],
            ':author' =>  $update_details['author'],
            ':description' => $update_details['description'],
            ':id' => $update_details['id']
             ]);
             return $result;
        }
        // update function ends

        // sorting starts 
        public function sort($sort_option,$limit,$offset){
            $query = "SELECT * FROM bookdetails ORDER BY book_name $sort_option LIMIT $limit OFFSET $offset";
            $statement = $this->pdo->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        // sorting ends

        // search count
        public function search_count($search_word){
            $count_query = "SELECT * FROM bookdetails WHERE book_name LIKE :data OR author LIKE :data";
            $count_statement = $this->pdo->prepare($count_query);
            $count_statement->execute([
            ':data' => $search_word
            ]);
            $total_records = $count_statement->rowCount();
            // echo 'total record is '. $total_records;
            return $total_records;
        }
        // searching starts 
         public function search($search_word,$limit,$offset){
            // $statement = $this->pdo->prepare("select * from {$table_name}  limit {$limit} offset {$offset}");
            $search_query = "SELECT * FROM bookdetails WHERE book_name LIKE :data OR author LIKE :data LIMIT $limit OFFSET $offset ";
            $statement = $this->pdo->prepare($search_query);
            $statement->execute([
            ':data'=> $search_word
            ]);
            $result = $statement->fetchAll();
            return $result;
        }

}
?>
