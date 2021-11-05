<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
if($_SESSION['user_type']!=1)
{
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to Home page");
    window.location = "../../index.php";
  </script>
<?php
}
$sql = "SELECT  * FROM movie_details";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");


?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Movie&nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Movie Name</th>
                     <th>Category</th>
                     <th>Directors</th>
                     <th width="15%">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

      
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>'. $row['movie_name'].'</td>';
                echo '<td>'. $row['Categorys'].'</td>';
                echo '<td>'. $row['directors_name'].'</td>';
                ?>
                <?php
                  $movie_id=$row['movie_id'];
                echo '<td class="text-center">';
                ?>
                  <input type="image" src="https://i.ibb.co/GTDGd2G/view.png" alt="view" border="0" width="30" height="30"   id="<?php echo $movie_id; ?>" class=" view_data" />
                  <br> 
                  <input type="image" src="https://i.ibb.co/4pQmLfz/edit.png" alt="edit" border="0" width="30" height="30"  id="<?php echo $movie_id; ?>" class="edit_data" />
                  <br>
                  <input type="image" src="https://i.ibb.co/s5MCkyz/delete.png" alt="delete" border="0" width="30" height="30"  name="delete"  value="delete" id="<?php echo $movie_id; ?>" class=" delete" />
                  <?php
                  echo '</td>' ;
          echo '</tr> ';
                  }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>

  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Movie</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" enctype="multipart/form-data" action="movie-add.php?action=add">
           <div class="form-group">
             <input class="form-control" placeholder="Movie Name" name="movie_name" required>
           </div>
           <div class="form-group">
              <label>Movie Image:</label>
              <input type="file" name="movie_image" required>
            </div>
            <div class="form-group">
             <input class="form-control" placeholder="Categorys" name="categorys" required>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Movie Language" name="movie_language" required>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Trailer Link" name="movie_trailerlink" required>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Movie Length" name="movie_length" required>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Artists Name" name="artist_name" required>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Directors Name" name="directors_name" required>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Writers Name" name="writers_name" required>
           </div>
           <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date Of Release" name="dateofrelease" required>
           </div>
           <div class="form-group">
             <textarea rows="6" cols="50" texarea" class="form-control" placeholder="Short Description" name="short_description" required></textarea>
           </div>
           <div class="form-group">
             <textarea rows="15" cols="50" texarea" class="form-control" placeholder="Full Description" name="full_description" required></textarea>
           </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>




 <!-- PHP Ajax Update MySQL Data Through Bootstrap Modal -->
 <div id="add_data_Modal" class="modal fade">  
  <div class="modal-dialog modal-lg">  
    <div class="modal-content">  

      <div class="modal-header">  
         <h4 class="modal-title">Edit Movie data</h4>  
         <button type="button" class="close" data-dismiss="modal">&times;</button>  
      </div>  

      <div class="modal-body">  
        <form method="post" id="insert_form">  

              <label>Movie Name:</label>
              <input class="form-control"  id="movie_name" name="movie_name" required>

              <label>Categorys:</label>
              <input class="form-control" id="categorys" name="categorys" required>

              <label>Language:</label>
              <input class="form-control" id="movie_language" name="movie_language" required>

              <label>Trailer Link:</label>
              <input class="form-control" id="movie_trailerlink" name="movie_trailerlink" required>

              <label>Movie Length:</label>
              <input class="form-control" id="movie_length" name="movie_length" required>

              <label>Artist Name:</label>
              <input class="form-control" id="artist_name" name="artist_name" required>

              <label>Directors Name:</label>
              <input class="form-control" id="directors_name" name="directors_name" required>

              <label>Writers Name:</label>
              <input class="form-control" id="writers_name" name="writers_name" required>

              <label>Date of Release:</label>
              <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" id="dateofrelease" name="dateofrelease" required>

              <label>Short Description</label>
              <textarea rows="6" cols="50" id="short_descriptions" class="form-control" name="movie_short_descriptions" required></textarea>

              <label>Full Description:</label>
              <textarea rows="15" cols="50" id="full_descriptions" class="form-control" name="movie_full_descriptions" required></textarea>
              
              <input type="hidden" name="movie_id" id="movie_id" />  
              <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
        </form>  
      </div>  
    
      <div class="modal-footer">  
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
      </div>  
    </div>  
  </div>  
 </div> 
  <!-- / PHP Ajax Update MySQL Data Through Bootstrap Modal -->



<!-- Movie Details -->
<div id="dataModal" class="modal fade" >  
      <div class="modal-dialog modal-xl ">  
           <div class="modal-content">  
                <div class="modal-header">  
                <h4 class="modal-title">Movie Details</h4>  
              <button type="button" class="close" data-dismiss="modal">&times;</button>  
                 </div>  
                <div class="modal-body" id="movie_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="movie-list.php">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <!-- /Applicants Details -->


 <script>  
 $(document).ready(function() {
    $('#add').click(function() {
        $('#insert').val("Insert");
        $('#insert_form')[0].reset();
    });

   $(document).on('click', '.edit_data', function() {
          var id = $(this).attr("id");
          $('#movie_id').val(id);
          $.ajax({
              url: "movie-fetch.php",
              method: "POST",
              data: {
                  movie_id: id
              },
              dataType: "json",
              success: function(data) {
                  $('#movie_name').val(data.movie_name);
                  $('#categorys').val(data.Categorys);
                  $('#movie_language').val(data.movie_language);
                  $('#movie_trailerlink').val(data.trailerlink);
                  $('#movie_length').val(data.movie_length);
                  $('#artist_name').val(data.artist_name);
                  $('#directors_name').val(data.directors_name);
                  $('#writers_name').val(data.writers_name);
                  $('#dateofrelease').val(data.dateofrelease);
                  $('#short_descriptions').val(data.movie_short_descriptions);
                  $('#full_descriptions').val(data.movie_full_descriptions);
                  $('#insert').val("Update");
                  $('#add_data_Modal').modal('show');
                  //$('#movie_id').val(data.movie_id);
              }
          });
      });

    $('#insert_form').on("submit", function(event) {
        event.preventDefault();
        if ($('#movie_name').val() == "") {
            alert("Movie Name Required");
        } else if ($('#categorys').val() == '') {
            alert("Categorys Name Required");
        }
        else if ($('#movie_language').val() == '') {
            alert("Language Name Required");
        }
        else if ($('#movie_length').val() == '') {
            alert("Movie Length Required");
        }
        else if ($('#artist_name').val() == '') {
            alert("Artist Name Required");
        }
        else if ($('#directors_name').val() == '') {
            alert("Directors Name Required");
        }
        else if ($('#writers_name').val() == '') {
            alert("Writers Name Required");
        }
        else if ($('#dateofrelease').val() == '') {
            alert("Date of Release Required");
        }
        else if ($('#short_descriptions').val() == '') {
            alert("Short Descriptions Required");
        }
        else if ($('#full_descriptions').val() == '') {
            alert("Full Descriptions Required");
        }
          else {
            $.ajax({
                url: "movie-insert.php",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function() {
                    $('#insert').val("Inserting");
                },
                success: function(data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    alert(data) ? "" : location.reload();

                }
            });
        }
    });

    $(document).on('click', '.view_data', function() {
    var movie_id = $(this).attr("id");
    if (movie_id != '') {
        $.ajax({
            url: "movie-details.php",
            method: "GET",
            data: {
                movie_id: movie_id
            },
            success: function(data) {
                $('#movie_detail').html(data);
                $('#dataModal').modal('show');
                $(this).remove();
            }
        });
      }
    });
    
     // Delete 
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var deleteid = $(this).attr("id");
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'movie-delete.php',
        type: 'POST',
        data: { id:deleteid },
        success: function(response){

          if(response == 1){
      // Remove row from HTML Table
      $(el).closest('tr').css('background','tomato');
      $(el).closest('tr').fadeOut(800,function(){
         $(this).remove();
      });
          }else{
      alert('Invalid ID.');
          }

        }
      });
   }

 });
    

});
 </script> 