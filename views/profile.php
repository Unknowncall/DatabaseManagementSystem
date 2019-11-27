<div style="padding-top: 10px;">
<div class="container">
    <h1 style="text-align:center; text-decoration:underline; padding-bottom:5px;">Profile</h1>
    <h4 class="border-bottom">Welcome<?php echo ' '.$_SESSION['user']; ?></h4>
    <div class="col-md-1 offset-md-11"><button id="edit" class="btn btn-primary" onclick="edit()">Edit</button></div>
    <form action="index.php?mode=updatedinfo" method="post">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label>First name</label>
                <input id="first" type="text" class="form-control" name="fname" disabled <?php
                       if(isset($dataList)){
                           echo "value='{$dataList['first_name']}'>";
                       } ?>
            </div>
            <div class="col-md-4 mb-3">
                <label>Last name</label>
                <input id="last" type="text" class="form-control" placeholder="Last name" name="lname" disabled <?php
                       if(isset($dataList)){
                           echo "value='{$dataList['last_name']}'>";
                       } ?>
            </div>
            <div class="col-md-4 mb-3">
                <label>Username</label>
                <input id="user" type="text" class="form-control" placeholder="Username" name="username" disabled <?php
                       if(isset($dataList)){
                           echo "value='{$dataList['username']}'>";
                       } ?>
            </div>
        </div>
        <div style="padding-bottom:10px;"><button id="save" class="btn btn-success" type="submit" disabled>Save</button></div>
    </form>
</div>
</div>
<script type="text/javascript">
function edit(){
    document.getElementById('edit').disabled = true;
    document.getElementById('user').disabled = false;
    document.getElementById('last').disabled = false;
    document.getElementById('first').disabled = false;
    document.getElementById('save').disabled = false;
}
</script>