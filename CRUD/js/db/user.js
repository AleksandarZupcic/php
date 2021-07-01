function readyXhttp(displayIn){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            displayIn.innerHTML = this.responseText;
        }
    };
    return xhttp;
}

function userDataJson(){
    const email = $("#tbEmail").val();
    const username = $("#tbUsername").val();
    const password = $("#tbPassword").val();
    const firstname = $("#tbFirstName").val();
    const lastname = $("#tbLastName").val();
    const dob = $("#dateDob").val();

    const data = {
        email: email, 
        username: username, 
        password: password,
        firstname: firstname,
        lastname: lastname,
        dob: dob,
    };
    return data;
}

function createUser(){
    $(this).on('submit', function(e){
        e.preventDefault();
        $.ajax({  
            type: 'POST',  
            url: './db/ops/user/create.php', 
            data: userDataJson(),
            success: function(response) {
                console.log(response);
            }
        });
    });
    window.location.reload();
}

function sortMe(val){
    readUser(val);
}

function readUser(sortby = null){
    let sortdata = {};
    if(sortby !== null){
        sortdata = {sortby: sortby};
    }

    $(document).ready(function(){
        const phpfile = "./db/ops/user/read.php";
        $.ajax({
            type: 'GET',  
            url: phpfile,
            data: sortdata,
            success: function(response) {
                $("#tb-users").html(response);
            }
        });
    });
}

function fillForm(id){
    $(document).ready(function(){
        $.ajax({  
            type: 'GET',  
            url: './db/ops/user/getone.php',
            data: { userid: id },
            success: function(response) {
                $("#tbEmail").val(response.email);
                $("#tbUsername").val(response.username);
                $("#tbPassword").val(response.pword);
                $("#tbFirstName").val(response.firstname);
                $("#tbLastName").val(response.lastname);
                $("#dateDob").val(response.dateofbirth.split(" ")[0]);
                
                var btnForm = document.getElementById('btnForm');
                btnForm.value = "Update user";
                document.getElementById("userform").setAttribute('onsubmit', 'updateUser('+response.userid+')');
            }
        });
    });
}

function updateUser(id){
    $(this).on("submit", function(e){
        e.preventDefault();
        var updateJson = userDataJson();
        updateJson.userid = id;
        $.ajax({  
            type: 'POST',  
            url: './db/ops/user/update.php', 
            data: updateJson,
            success: function(response) {
                console.log(response);
                var btnForm = document.getElementById('btnForm');
                btnForm.value = "Insert user";
                document.getElementById("userform").setAttribute('onclick', 'createUser()');
            }
        });
    });
    window.location.reload();
}

function deleteUser(id){
    $(document).ready(function(){
        $.ajax({  
            type: 'POST',  
            url: './db/ops/user/delete.php', 
            data: {userid: id},
            success: function(response) {
                console.log(response);
                readUser();
            }
        });
    });
}