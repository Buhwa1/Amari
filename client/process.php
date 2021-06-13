// require_once('config.php');
// $msg="";
// $firstname = $lastname = $email = $pass = "";

// $firstname = $_POST['firstname'];
// $lastname = $_POST['lastname'];
// $email = $_POST['email'];
// $pass =$_POST['password'];
// $password = MD5($pass);

// $query = "SELECT * FROM users WHERE email ='$email";
// $num = mysqli_query($connect,$query);
// $nume = mysqli_num_rows($num);
// $e = '';
// if($nume>0){

// echo "Email is taken";
// return false;
// }
// else{
// $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES('$firstname','$lastname','$email','$password')";
// $result = mysqli_query($connect,$sql);

// if($result){
// header("Location: login.php");
// }
// else{
// echo "Error : ".$sql;
// }
// }
// if(isset($_POST['create'])){
// $firstname = $_POST['firstname'];
// $lastname = $_POST['lastname'];
// $email = $_POST['email'];
// $pass =$_POST['password'];
// $password = MD5($pass);

// $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES(?,?,?,?)";
// $stmtinsert = $db->prepare($sql);
// $result = $stmtinsert->execute([$firstname, $lastname, $email, $password]);
// if($result){
// echo 'Data successfully saved.';
// }else{
// echo 'Data could not be saved.';
// }
// }else{
// echo 'No data';
// }