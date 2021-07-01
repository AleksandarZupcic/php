<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        table{
            font-size: 12px;
        }
    </style>
</head>
<body onload = "readUser();">
    <h1 class = "text-center my-3">C.R.U.D</h1>
    <div class = "container">
        <div class = "row">
            <div class = "col-md-5 col-lg-4 order-md-first border-right">
                <form id = "userform" onsubmit = "createUser();">
                    <h2>User Info</h2>
                    <div class = "form-group">
                        <label for = "tbEmail">
                            <strong>Email</strong>
                        </label>
                        <input type = "email" 
                            class = "form-control" 
                            id = "tbEmail" 
                            aria-describedby = "emailHelp" required>
                            <small id = "emailHelp" 
                            class="form-text text-muted">
                                Your email is safe with us.
                            </small>
                    </div>

                    <div class = "row">
                        <div class = "col">
                            <label for = "tbUsername">
                                <strong>Username</strong>
                            </label>
                            <input type = "username" 
                                class = "form-control" 
                                id = "tbUsername"
                                aria-describedby = "username" required>
                        </div>
                        <div class = "col">
                            <label for = "tbPassword">
                                <strong>Password</strong>
                            </label>
                            <input type = "password" 
                                class = "form-control" 
                                id = "tbPassword" 
                                aria-describedby = "password" required>
                        </div>
                    </div>
                    <hr/>
                    <h2>Personal Info</h2>
                    <div class = "row">
                        <div class = "col">
                            <label for = "tbFirstName">
                                <strong>First Name</strong>
                            </label>
                            <input type = "text" 
                                class = "form-control" 
                                id = "tbFirstName" 
                                name = "tbFirstName"
                                aria-describedby = "first name" required/>
                        </div>
                        <div class = "col">
                            <label for = "tbLastName">
                                <strong>Last Name</strong>
                            </label>
                            <input type = "text" 
                                class = "form-control" 
                                id = "tbLastName" 
                                name = "tbLastName"
                                aria-describedby = "last name" required/>
                        </div>
                    </div>
                    <br/>
                    <div class = "form-group">
                        <label for = "dateDob">
                            <strong>Date of Birth</strong>
                        </label>
                        <input type = "date" 
                            class = "form-control"
                            id = "dateDob"
                            name = "dateDob"
                            aria-describedby = "date of birth" required/>
                    </div>

                    <div class = "form-group">
                        <input type = "submit"
                            id = "btnForm"
                            name = "btnForm";
                            class = "form-control btn btn-primary"
                            value = "Insert User"
                            /><!--onclick = 'createUser();'-->
                    </div>
                </form>
                <div id = "displaystuff">
                </div>
            </div>

            <div class = "col-md-7 col-lg-8 order-first">
                <h2 class = "text-center">Users</h2>
                <form>
                    <div class = "row">
                        <div class = "col">
                            <div class = "form-group">
                                <label for = "ddlSort">
                                    <strong>Sort By</strong>
                                </label>
                                <select id = "ddlSort"
                                    name = "ddlSort"
                                    onchange = "sortMe(this.value);"
                                    class = "form-control">
                                        <option value = "ddlfirstname">First Name</option>
                                        <option value = "ddllastname">Last Name</option>
                                        <option value = "ddldob">Date of Birth</option>
                                        <option value = "ddldatejoined">Date Joined</option>
                                </select>
                            </div>
                        </div>
                        <!--
                        <div class = "col">
                            <div class = "form-group">
                                <label for = "tbSearch">
                                    <strong>Search For..</strong>
                                </label>
                                <input type = "text"
                                    id = "tbSearch"
                                    name = "tbSearch"
                                    class = "form-control"
                                    placeholder="Name of the user"/>
                            </div>
                        </div>
    -->
                    </div>
                </form>

                <div id = "tb-users" name = "tb-users">
                </div>

                <!--
                <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
    -->
            </div>
        </div>
    </div>

    <script src = "jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/c0951c4432.js"></script>
    
    <script src = "js/db/user.js"></script>

</body>
</html>