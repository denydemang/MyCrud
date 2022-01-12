jQuery.validator.addMethod("hanyahuruf", function(value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Only alphabetical characters");



$(document).ready(function(){
    $('form').each(function(){
        $(this).validate({
            rules: {
                nim: {
                    required: true
            },  nama: {
                    required: true,
                    hanyahuruf: true
            },  kelas: {
                    required: true,
                    nowhitespace : true,
                    maxlength: 5
            },  email: {
                    required: true,
                    email: true
          
            },  gambar: {
                    required: true,
                    extension: "png|jpeg|jpg",
                    maxsize: 1000000,
          
            },  jk: {
                    required: true,
   
            },  jurusan: {
                    required: true,

             },  prodi: {
                    required: true,

            },  
               
        },
            messages: {
                nim: {
                    required: 'Nim Tidak Boleh Kosong Kak, Primary Key Soalnya :)'
            },  nama: {
                    required: 'Nama nya Siapa Ya Kak?, Diisi Yak',
                    hanyahuruf: 'Nama Tidak Boleh Mengandung Angka'
            },  kelas: {
                    required: 'Kelasnya Diisi Kak, Nggak Boleh Kosong',
                   // rangelength: 'Contact should be 10 digit number.',
                    nowhitespace: 'Nama Kelas Tidak Boleh Ada Spasi',
                    maxlength: 'Nama Kelas Tidak Boleh Melebihi 4 karakter'
            },  email: {
                    required: 'Emailnya Diisi Ya Kak Jangan Lupa',
                 //   minlength: 'Password must be at least 8 characters long.',
                    email: 'Email yang kakak masukkan tidak valid'
            },  gambar: {
                    required: 'Pilih File',
                 //   minlength: 'Password must be at least 8 characters long.',
                    extension: "Pilih File Gambar Berekstensi *jpeg,*jpg,*png",
                    maxsize:  "File Tidak Boleh Lebih dari 1 MB"
                    
            },  jk: {
                    required: 'Lohh Kakak Nggak Punya Kelamin?, Dipilih yak salah satu',
               //   minlength: 'Password must be at least 8 characters long.',
          
            },  jurusan: {
                    required: 'Jurusan Nya Apa Ya Kak?, Silakan Pilih Jurusan.',
                //   equalTo: 'Confirm Password do not match with Password.',
            },
                prodi: {
                    required: 'Program Studi Tidak Boleh Kosong kak',
                //   equalTo: 'Confirm Password do not match with Password.',
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