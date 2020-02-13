<main role="main" class="container">
    <div class="starter-template">
        <label for="">Changer les informations d'un employé</label>
        
    <form action=<?php echo "index.php?c=employee&m=editemploye&id=".$list[0]->EmployeeID ?> method="post">
  <div class="form-group">
    Nom:<input type="text" name ="nom" value= "<?php echo $list[0]->FirstName; ?>" class="form-control">
    prenom:<input type="text" name="prenom" value= "<?php echo $list[0]->LastName; ?>" class="form-control" placeholder="Enter prenom">
    poste:<input type="text" name="poste"class="form-control" placeholder="Enter poste">
    <!-- date d'ambauche<input type="text" class="form-control" placeholder="Enter date d'aumbauche">  -->
    Mail:<input type="text" name="mail" value="<?php echo $list[0]->EmailAddress; ?>" class="form-control" placeholder="Enter mail">
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</main><!-- /.container -->
