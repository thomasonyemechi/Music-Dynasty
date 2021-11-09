//validating login form input on submit
$('#login_user').on('click', function (e) {
    e.preventDefault();
    const email = $('#email').val();
    const password = $('#password').val();
    
    if(email == '' || password == ''){
        alert.setAttribute('class', 'alert bg-danger text-white');
        alert.innerHTML = 'Email cannot be empty'
    }else{
        alert.removeAttribute('class', 'alert bg-danger');
        alert.innerHTML = ''
        data = {
            email : email,
            password : password,
        };

        $.ajax({
            method: 'get',
            url: 'api.php?LoginUsersApiViaMusic=' + JSON.stringify(data),
            beforeSend: () => {
                $('#login_user').html(`Processing....`)
                $('#login_user').attr('disabled', 'disabled');
            }
        }).done( function (res) {
        	
            res = JSON.parse(res);
            if(res.success){
                
                alert.setAttribute('class', 'alert bg-success text-white');
                alert.innerHTML = res.message
                setTimeout(function () {
                	window.location.reload();
                }, 3000);

            }else{
                alert.setAttribute('class', 'alert bg-danger text-white');
                alert.innerHTML = res.message
            }
            $('#login_user').html(`Sign In`)
            $('#login_user').removeAttr('disabled');
        });
    }        
})