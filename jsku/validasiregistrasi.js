jQuery.validator.addMethod("hanyahuruf", function(value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Only alphabetical characters");

$(document).ready(function(){
    $('form').each(function(){
        $(this).validate({
            rules: {
                namadepan: {
                    required: true,
                    hanyahuruf: true
            },  namabelakang: {
                    required: true,
                    hanyahuruf: true
            },  email: {
                    required: true,
                    email: true
            },  username: {
                    required: true,
                    minlength: 7 
          
            },  pw: {
                    required: true,
          
            },  konfirmpw: {
                    required: true,
                    equalTo: "#pw"
   
            }

              
               
        },
            messages: {
                namadepan: {
                    required: 'Nama Tidak Boleh Kosong Boss',
                    hanyahuruf: 'Nama Tidak Boleh Mengandung Angka'
            },  namabelakang: {
                    required: 'Nama Tidak Boleh Kosong Boss',
                    hanyahuruf: 'Nama Tidak Boleh Mengandung Angka'
            }, email: {
                    required: 'Email Tidak Boleh Kosong Boss ',
                 //   minlength: 'Password must be at least 8 characters long.',
                    email: 'Email yang kamu masukkan tidak valid'
            },  username: {
                    required: 'Username Tidak Boleh Kosong Boss',
                    minlength: 'Username setidaknya terdapat 7 karakter',
                    
                    
            },  pw: {
                    required: 'Password Tidak Boleh Kosong Boss',
               //   minlength: 'Password must be at least 8 characters long.',
          
            },  konfirmpw: {
                    required: 'Ulangi Password Boss',
                    equalTo: 'Password Tidak Sama',
            },   
                   
        },  errorPlacement: function(error, element) 
            {
                if ( element.is(":radio") ) 
                {
                    error.appendTo( element.parents('.jeniskelamin') );
                }
                    else 
                { // This is the default behavior 
                    error.insertAfter( element );
                }
            },
            submitHandler: function (form) {
                form.submit();

                 }


        
        })
    })
})