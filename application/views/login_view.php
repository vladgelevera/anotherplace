<div class="container">
	<div class="page-header">
		<h1>Login</h1>
	</div>
</div>
<div class="container">
	<form class="form-horizontal" role="form" method="GET" action="/admin/login">
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">User:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-4"> 
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
</div>