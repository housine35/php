<?php
class EmployeeController {
    public function construct(){}

    public function index() {
      $this->list();
    }
    public function list(){
      require_once MODELS.DS.'employeeM.php';
      $m=New EmployeeModel();
      $employees=$m->listAll();
      // Affichage au sein de la vue des données récupérées via le model
      require_once CLASSES.DS.'view.php';
      $v=new View();
      $v->setVar('employeelist',$employees);
      $v->render('employee','list');
    }
    public function view($id=null){
      require_once MODELS.DS.'employeeM.php';
      $m=New EmployeeModel();
      require_once CLASSES.DS.'view.php';
      $v=new View();
      if ($employee=$m->listOne($id)) $v->setVar('e',$employee);
      // Affichage au sein de la vue des données récupérées via le model
      $v->render('employee','view');
    }

    
    public function edit($id=null){
      //echo $id;
      require_once MODELS.DS.'employeeM.php';
      $employeemodel= new EmployeeModel();
      $listt=$employeemodel->recuprer($id);
     // var_dump($listt);
      require_once CLASSES.DS.'view.php';
        $v=new View();
        $v->setVar('list',$listt); 
        $v->render('employee','form');
               
    }

  public function editemploye($id=null){
        if(isset($_POST['submit'])){
          $title =$_POST['poste'];
          $nom =$_POST['nom'];
          $prenom =$_POST['prenom'];
          $mail =$_POST['mail'];

          //$prenom =$_POST['prenom'];
          require_once MODELS.DS.'employeeM.php';
          $employeemodel= new EmployeeModel();
          $employeemodel->edit($id,$title,$nom,$prenom,$mail);
          
        require_once CLASSES.DS.'view.php';
        $v=new View();
        $v->render('home','index');
        }

  }  
  

    public function delete($id=null){
      require_once MODELS.DS.'employeeM.php';
      $employeemodel= new EmployeeModel();
      $employeemodel->delete($id);
     
      require_once CLASSES.DS.'view.php';
        $v=new View();
        $v->render('home','index');
    }

}
?>