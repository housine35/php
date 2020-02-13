<?php
class EmployeeModel {
    public function construct(){}
    public function listAll(){
      $sql='select E.EmployeeID, C.ContactID, E.NationalIDNumber,E.Title as ETitle, C.Title as CTitle, C.FirstName, C.MiddleName, C.LastName, C.EmailAddress, E.HireDate
      from employee as E
      inner join contact as C on E.ContactID=C.ContactID';
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=adventureworks;charset=utf8', 'root', '1234');
        $stmt=$dbh->prepare($sql);
        //$stmt->bindParam(":var",$var);
        $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
        $dbh = null;
        return $res;
      } catch (PDOException $e) {
          print "Erreur !: " . $e->getMessage() . "<br/>";
          die();
      }
    }
    public function listOne($id){
      $sql='select E.*, C.*,E.Title as ETitle, C.Title as CTitle, EM.Title as EMTitle, CM.Title as CMTitle, CM.FirstName as CMFirstName, CM.MiddleName as CMMiddleName, CM.LastName as CMLastName
      from employee as E
      inner join contact as C on E.ContactID=C.ContactID
      left join employee as EM on E.ManagerID=EM.EmployeeID
      left join contact as CM on EM.ContactID=CM.ContactID
      where E.EmployeeID=:id';
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=adventureworks;charset=utf8', 'root', '1234');
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":id",$id);
        $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
        $dbh = null;
        return current($res);
      } catch (PDOException $e) {
          print "Erreur !: " . $e->getMessage() . "<br/>";
          die();
      }
    }

    public function recuprer($id)
    {   

        echo $id;
        $sql='select E.EmployeeID, C.ContactID, C.FirstName, C.LastName, C.EmailAddress, E.Title
        from employee as E

        inner join contact as C on E.ContactID=C.ContactID where  E.EmployeeID='.$id;
        try{
          $dbh = new PDO('mysql:host=localhost;dbname=adventureworks;charset=utf8', 'root', '1234');
          $stmt=$dbh->prepare($sql);
          $stmt->bindParam(":id",$id);
          $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
          return $res;
          

           }
            catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
         }
         
    }

    public function edit($id,$title,$nom,$prenom,$mail)
    {
      $sql='update employee,contact SET employee.Title=:title ,contact.LastName=:nom ,contact.Firstname=:prenom ,contact.EmailAddress=:mail Where employee.EmployeeID=:id and contact.ContactID=employee.ContactID';
      try{
        $dbh = new PDO('mysql:host=localhost;dbname=adventureworks;charset=utf8', 'root', '1234');
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prenom", $prenom);
        $stmt->bindParam(":mail", $mail);
        $yemak=$stmt->execute();
        //$res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
         // echo $res['FirstName']." ".$res['LastName']." ".$res['EmailAddress'];
       return $yemak;
         }
          catch (PDOException $e) {
          print "Erreur !: " . $e->getMessage() . "<br/>";
          die();
       }

    }

    public function delete($id)
    {
      
        $sql='Delete from employee where EmployeeID='.$id;
        try{
          $dbh = new PDO('mysql:host=localhost;dbname=adventureworks;charset=utf8', 'root', '1234');
          $stmt=$dbh->prepare($sql);
          $stmt->bindParam(":id", $id);
          $yemak=$stmt->execute();
          //$res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
           // echo $res['FirstName']." ".$res['LastName']." ".$res['EmailAddress'];
         return $yemak;
           }
            catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
         }


    }

}
?>