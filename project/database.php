<?php
const DB_SERVER = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'salesinvoice';

class DB_con
{
    /**
     * @var false|mysqli|null
     */
    private $dbh;

    function __construct()
    {
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbh = $con;

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public function insert($id, $iname, $phone, $contact, $addresss, $dat)
    {

        $query = "INSERT INTO `sadiq`(`id`, `iname`, `phone`, `contact`, `addresss`, `dat`) VALUES ('$id','$iname','$phone','$contact','$addresss','$dat')";

        return mysqli_query($this->dbh, $query);
    }

    public function viewinvoice()
    {
        $query = "Select * from `sadiq` ";

        return mysqli_query($this->dbh, $query);
    }

//    public function additems($id, $description, $amount)
//    {
//        $query = "INSERT INTO `items`(`id`, `description`, `amount`) VALUES ('$id','$description','$amount')";
//
//        return mysqli_query($this->dbh, $query);
//    }

    public function deleteinvoice($id)
    {
        $ids=mysqli_real_escape_string($this->dbh,$id);
        $query = "delete  from `sadiq` where id ='$ids'";

        return mysqli_query($this->dbh, $query);
    }

    public function viewclient($id){
        $ids=mysqli_real_escape_string($this->dbh,$id);
        $query = "SELECT * FROM `sadiq` where id ='$ids'";
        $query2 =mysqli_query($this->dbh, $query);
        return mysqli_fetch_array($query2);
    }
    public function editinvoice($id)
    {
        $ids=mysqli_real_escape_string($this->dbh,$id);
        $query = " Select * from `sadiq` where id ='$ids' "  ;
        $query2=mysqli_query($this->dbh, $query);
        return mysqli_fetch_array($query2);

    }
    public function updateinvoice()
    {
        $id = mysqli_real_escape_string($this->dbh,$_POST['id']);
        $iname = mysqli_real_escape_string($this->dbh,$_POST['iname']);
        $phone = mysqli_real_escape_string($this->dbh,$_POST['phone']);
        $contact = mysqli_real_escape_string($this->dbh,$_POST['contact']);
        $addresss = mysqli_real_escape_string($this->dbh,$_POST['addresss']);
        $dat = mysqli_real_escape_string($this->dbh,$_POST['dat']);
        $query = " Update `sadiq` set iname='$iname',phone='$phone',contact='$contact',addresss='$addresss',dat='$dat' where id ='$id' "  ;
        $result=mysqli_query($this->dbh, $query);
        if ($result) {
            echo "<script>alert('Data inserted');window.location.href='index.php'; </script>";

        } else {
            echo "<script>alert('Data not inserted');</script>";
        }

    }
    public function viewdescription($id){
        $ids=mysqli_real_escape_string($this->dbh,$id);
        $sql = "SELECT * FROM `items` where id ='$ids'";
        $result = $this->dbh->query($sql);

        if ($result->num_rows > 0) {
            $output=[];
            $output2=[];
            $i=0;
            // output data of each row
            while($row = $result->fetch_assoc()) {
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
                echo "<script>alert('Data inserted');window.location.href='index.php';</script>";

            } else {
                echo "<script>alert('Data not inserted');</script>";
            }
        }
    }
    public function items(){
        $number = count($_POST["id"]);
        $id = $_POST["id"];
        $description = $_POST["description"];
        $amount = $_POST["amount"];

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




