<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Songs</title>
        <?php
        include "includes/head.php";
        ?>
        </head>
    <body class="sb-nav-fixed">
        <?php
        include "includes/header.php";
        ?>
        <div id="layoutSidenav">
        <?php
        include "includes/sidebar.php";
        ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Songs</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Songs Information</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Songs Information
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="add-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab" aria-controls="add" aria-selected="true">Add Song</button>
                                      </li>
                                      <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button" role="tab" aria-controls="view" aria-selected="false">View Songs</button>
                                      </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="add-tab">
                            <br>    <div class="container-fluid">    
                                        <div class="card-header">
                                            <h5 class="modal-title">Add Song</h5>
                                        </div> 
                                        <div class="card-body">   
                                              <form class="addSong">
                                                    <div class="mb-3">
                                                      <label for="exampleFormControlInput1" class="form-label">Select Medium</label>
                                                      <br>
                                                      <select class='form-control select-medium-id' data-validation='required'>
                                                            <option value="">Select Medium</option>
                                                            <?php 
                                                            include "../config/db.php";  
                                                            $query = mysqli_query($con,"select id,title from medium"); 
                                                            while($row=mysqli_fetch_object($query)){  
                                                            ?>
                                                            <option value='<?=$row->id?>'><?=$row->title?></option>
                                                            <?php    
                                                            }                            
                                                            ?>
                                                      </select>
                                                    </div>
                                                    <div class="mb-3">
                                                      <label for="exampleFormControlInput1" class="form-label">Select Singer</label>
                                                      <br>
                                                      <select class='form-control singers' data-validation='required'>
                                                        <option value="">Select Singer</option>
                                                      </select>
                                                    </div>
                                                    <div class="mb-3">
                                                      <label for="exampleFormControlInput1" class="form-label">Select Album</label>
                                                      <br>
                                                      <select class='form-control albums' data-validation='required' name="album_id">
                                                        <option value="">Select Album</option>
                                                      </select>
                                                    </div>
                                                    <div class="mb-3">
                                                      <label for="exampleFormControlInput1" class="form-label">Song Title</label>
                                                      <input type="text" class="form-control" name="title" data-validation='required'>
                                                    </div>
                                                    <div class="mb-3">
                                                      <label for="exampleFormControlInput1" class="form-label">File</label>
                                                      <input type="file" class="form-control" name="file" data-validation='required'>
                                                    </div>
                                                    
                                    <br>
                                                    <div class="modal-footer pull-right">
                                                        <div class="input-group flex-nowrap">
                                                          <input type="submit" class="btn btn-success" value="Add">  
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>    
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="view" role="tabpanel" aria-labelledby="view-tab">
                         <br>         <div class="container-fluid">    
                                         <div class="card-header">
                                            <h5 class="modal-title">View Songs</h5>
                                        </div> 
                                        <div class="card-body">
                                          <div class="mb-3">
                                              <label for="exampleFormControlInput1" class="form-label">Select Medium</label>
                                              <br>
                                              <select class='form-control select-medium-id' data-validation='required'>
                                                    <option value="">Select Medium</option>
                                                    <?php 
                                                    include "../config/db.php";  
                                                    $query = mysqli_query($con,"select id,title from medium"); 
                                                    while($row=mysqli_fetch_object($query)){  
                                                    ?>
                                                    <option value='<?=$row->id?>'><?=$row->title?></option>
                                                    <?php    
                                                    }                            
                                                    ?>
                                              </select>
                                            </div>
                                            <div class="mb-3">
                                              <label for="exampleFormControlInput1" class="form-label">Select Singer</label>
                                              <br>
                                              <select class='form-control singers' data-validation='required'>
                                                <option value="">Select Singer</option>
                                              </select>
                                            </div>
                                            <div class="mb-3">
                                              <label for="exampleFormControlInput1" class="form-label">Select Album</label>
                                              <br>
                                              <select class='form-control albums' data-validation='required' name="album_id">
                                                <option value="">Select Album</option>
                                              </select>
                                            </div>
                                            <div class="viewSong"></div>
                                        </div>    
                                      </div>          
                                  </div>
                                </div>
                    </div>
                </div>
            </main>
        </div> 

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
            <button type="button" class="close" onclick='closeModel()' aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="editSongs">
            <div class="modal-body">
                <input type="hidden" name="id">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Select Medium</label>
                    <br>
                    <select class='form-control select-medium-id' data-validation='required'>
                          <option value="">Select Medium</option>
                          <?php 
                          include "../config/db.php";  
                          $query = mysqli_query($con,"select id,title from medium"); 
                          while($row=mysqli_fetch_object($query)){  
                          ?>
                          <option value='<?=$row->id?>'><?=$row->title?></option>
                          <?php    
                          }                            
                          ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Select Singer</label>
                    <br>
                    <select class='form-control singers' data-validation='required'>
                      <option value="">Select Singer</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Select Album</label>
                    <br>
                    <select class='form-control albums' data-validation='required' name="album_id">
                      <option value="">Select Album</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Song Title</label>
                    <input type="text" class="form-control" name="title" data-validation='required'>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">File</label>
                    <input type="file" class="form-control" name="file" data-validation='required'>
                  </div>
                   <div class="mb-3">
                    <input type="text" class="form-control" name="oldfile" data-validation='required'>
                  </div>
<br>
                <div class="modal-footer pull-right">
                    <div class="input-group flex-nowrap">
                      <button type="button" class="btn btn-secondary"  onclick='closeModel()'>Close</button>  
                      <input type="submit" class="btn btn-success" value="Update">
                    </div>
                </div>
            </form>
          </div>             
        </div>
      </div>
    </div>


        <?php
        include "includes/scripts.php";
        ?>
        <script type="text/javascript" src="assets/js/validation.js"></script>
        <script type="text/javascript" src="assets/js/songs.js"></script>
        <script>
          $.validate({
            lang:"en"
          })
        </script>
    </body>
</html>
