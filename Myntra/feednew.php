<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
 
 
<div class="container">
 
 
<div class="col-sm-6" style="padding-top:50px;">
 
 
<div class="well">
 
 
<h2>How To Send Feedback Form Through PHP Email</h2>
 
 
</div>
 
 
 
 
<div class="col-md-12">
 
 
<div class="form-area">  
            <form role="form" id="frm_feedback" name="frm_feedback" method="post">
 
 
<div class="alert alert-success hide"></div>
 
 
              <br style="clear:both">
 
 
<h3 style="margin-bottom: 25px; text-align: center;">Feedback Form</h3>
 
 
 
 
 
<div class="alert alert-danger hide"></div>
 
 
 
 
<div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
</div>
 
 
 
 
<div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
</div>
 
 
 
 
<div class="form-group">
                <input type="number" pattern="[0-9]*" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number">
</div>
 
 
 
 
<div class="form-group">
                <textarea class="form-control" type="textarea" id="comments" name="comments" placeholder="comments" maxlength="140" rows="7"></textarea>               
</div>
 
 
              <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Submit Form</button>
            </form>
</div>
 
 
</div>
 
 
</div>
 
 
</div>

<script type="text/javascript">
// this is the id of the form
$("#frm_feedback").submit(function(e) {
    var string_msg = '';
 
    $.ajax({
           type: "POST",
           url: "email.php",
           data: $("#frm_feedback").serializeArray(), // serializes the form's elements.
           success: function(data)
           {
              var data  = jQuery.parseJSON(data);
 
              if(data.status) {
                $('.alert-success').toggleClass('hide');
                $('.alert-danger').addClass('hide');
                $('.alert-success').html(data.message);
               //console.log(data); // show response from the php script.
              } else {
                console.log(data);
                $('.alert-danger').toggleClass('hide');
                $('.alert-success').addClass('hide');
                string_msg = data.message.join('<br />');
                console.log(string_msg);
                $('.alert-danger').html(string_msg);
              }
           }
         });
 
    e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>