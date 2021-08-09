
<html>
<?php require ("../vendor/autoload.php");
$classobject=new DB_con();
$id=$_GET['id'];
$clientname=$classobject->viewclient($id);
$clientamount=$classobject->viewdescription($id);

?>
<head>
    <title>Yarikul Assement</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <style>
        .containerr {
            display: block;
            width: 85%;
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            text-align: left;
        }

        h2 {
            text-align: left;
        }

        h6 {
            text-align: right;
        }

        h4 {
            text-align: center;
        }

        .tagline {
            text-align: left;
            font-size: 14px;
        }

        ul#levels li {
            display: inline;
            float: right;
            padding-left: 65px
        }


    </style>
    <script>
        window.onload = function () {
            document.getElementById("pdfviewer")
                .addEventListener("click", () => {
                    const invoice = this.document.getElementById("pdfview");
                    console.log(invoice);
                    console.log(window);
                    var opt = {
                        margin: 1,
                        filename: 'invoice.pdf',
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 2 },
                        jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
                    };
                    html2pdf().from(invoice).set(opt).save();
                })
        }
    </script>
</head>
<div class="container border">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="../index.php"><button type="button" class="btn btn-primary">Home</button></a><button
            class="btn btn-primary" id="pdfviewer"> Download In pdf</button>
    </nav>
    <div class="containerr" id="pdfview">

        <h1><b>
                <div class="d-inline-flex p-2"><img src="https://yarikul.com/wp-content/uploads/favicon_Tekengebied-1-1.png" height="50px" width="50px" />Yarikul Infotech </h1>

        <div class="tagline">Srinagar ,Jammu and Kashmir</br>
            Phone:+91-999999999</br>
        </div>
        <br>
        <span style="font-size:12px;float:left;">

        Bill To :-<?= $clientname['iname']; ?><br>
        Phone  :- <?= $clientname['phone']; ?><br>
            Email  :-<?= $clientname['contact']; ?><br>
        Address:-<?= $clientname['addresss']; ?>

        </span></b>
        <h6>Invoice Number :- <?= $clientname['id']; ?>  </br>
            Date :-<?= $clientname['dat']; ?>
        </h6>
        </br></br></br>

            <table class="table" id="tb">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>

                </tr>
                </thead>
                <tbody>

                    <?php
                    $total=0;
                    $anything = count($clientamount[0]);
                    while($anything>=0){
                        ?>
                    <tr>
                        <td><?php echo $clientamount[0][$anything] ?></td>
                        <td><?php echo $clientamount[1][$anything] ?></td>
                    </tr>
                        <?php
                        $total=$clientamount[1][$anything] + $total;
                        $anything--;
                    }


                   ?>


                <tr>

                <tr><td>Total</td><td>
                            <?php echo $total ?>
                    </td> </tr>
                </tbody>
            </table>

        <div align="center">For any queries Related to the Invoice
            Contact : xyz@gmail.com </div>  </div>
</div>
</div>


</body>
</html>