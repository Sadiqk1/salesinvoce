<?php

require ('dbconn.php');


class DB_con extends dbconn
{
    /**
     * @var false|mysqli|null
     */


    public function insert($id, $iname, $phone, $contact, $addresss, $dat)
    {

        $query = "INSERT INTO `sadiq`(`id`, `iname`, `phone`, `contact`, `addresss`, `dat`) VALUES (?,?,?,?,?,?)";
        $stmt = $this->dbh->prepare($query);
        $stmt->bind_param("isssss",$id,$iname,$phone,$contact,$addresss,$dat);
        return $stmt->execute();

    }

    public function viewinvoice()
    {
        $query = "Select * from `sadiq` ";
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        return $stmt->get_result();

    }

    public function deleteinvoice($id)
    {
        $query = "delete  from `sadiq` where id =?";
        $stmt = $this->dbh->prepare($query);
        $stmt->bind_param("i", $id);
       return $stmt->execute();
    }

    public function viewclient($id){

        $query = "SELECT * FROM `sadiq` where id =?";
        $stmt = $this->dbh->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result =$stmt->get_result();
        $res =$result->fetch_assoc();
        return $res;
    }
    public function editinvoice($id)
    {
        $query = " Select * from `sadiq` where id =? ";
        $stmt = $this->dbh->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result =$stmt->get_result();
        $res =$result->fetch_assoc();
        return $res;
    }
    public function updateinvoice()
    {
        $id = mysqli_real_escape_string($this->dbh,$_POST['id']);
        $iname = mysqli_real_escape_string($this->dbh,$_POST['iname']);
        $phone = mysqli_real_escape_string($this->dbh,$_POST['phone']);
        $contact = mysqli_real_escape_string($this->dbh,$_POST['contact']);
        $addresss = mysqli_real_escape_string($this->dbh,$_POST['addresss']);
        $dat = mysqli_real_escape_string($this->dbh,$_POST['dat']);

        $query = " Update `sadiq` set iname=?,phone=?,contact=?,addresss=?,dat=? where id =? " ;
        $stmt = $this->dbh->prepare($query);
        $stmt->bind_param("isssss",$id,$iname,$phone,$contact,$addresss,$dat);
        $stmt->execute();
        var_dump($stmt->execute());
//        var_dump($stmt);
//        die;
        if ($stmt->execute()) {
            echo "<script>alert('Data inserted'); </script>";

        } else {
            echo "<script>alert('Data not inserted');</script>";
        }



    }
    public function viewdescription($id){

        $sql = "SELECT * FROM `items` where id =?";

        $res = $this->dbh->prepare($sql);
        $res->bind_param("i",$id);
        $res->execute();
        $res =$res->get_result();


        if ($res->num_rows > 0) {
            $output=[];
            $output2=[];
            $i=0;
            // output data of each row
            while($row = $res->fetch_assoc()) {
                $output[$i]=$row['description'] ;
                $output2[$i]=$row['amount'] ;
                $i++;
            }
        } else {
            $output[0] = "";
            $output[1] = "Please Add The Items To This Invoice!";

        }
        return array($output, $output2);
    }
    public function getid(){
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
        }
        return $id;
    }
    public function action()
    {
        if (isset($_POST['submit'])) {
            $id = mysqli_real_escape_string($this->dbh,$_POST['id']);
            $iname = mysqli_real_escape_string($this->dbh,$_POST['iname']);
            $phone = mysqli_real_escape_string($this->dbh,$_POST['phone']);
            $contact = mysqli_real_escape_string($this->dbh,$_POST['contact']);
            $addresss = mysqli_real_escape_string($this->dbh,$_POST['addresss']);
            $dat = mysqli_real_escape_string($this->dbh,$_POST['dat']);


            $sql = $this->insert($id, $iname, $phone, $contact, $addresss, $dat);

            if ($sql) {
                echo "<script>alert('Data inserted');window.location.href='';</script>";

            } else {
                echo "<script>alert('Data not inserted');</script>";
            }
        }
    }
    public function items(){
        $number = count($_POST["id"]);
        $id = mysqli_real_escape_string($this->dbh$_POST["id"]);
        $description = mysqli_real_escape_string($this->dbh$_POST["description"]);
        $amount = mysqli_real_escape_string($this->dbh$_POST["amount"]);

        if($number > 0)
        {
            for($i=0; $i<$number; $i++)
            {

                $sql = "INSERT INTO items(id,description,amount) VALUES('$id[$i]','$description[$i]','$amount[$i]')";
                mysqli_query($this->dbh, $sql);

            }
            echo "Data Inserted";
        }
        else
        {
            echo "Data  Not Found";
        }
    }


}
//Methods
$obj = new DB_con();
if($_GET['method']=="add"){
    echo $obj->items();
}else if($_GET['method']=="client") {
    echo $obj->action();
}
else if($_GET['method']=="edit"){
    echo $obj->updateinvoice();
    }




