$(document).ready(function(){
    $('#keywords').on('keyup', function(){
        $('#bungkus-table').load('mahasiswa.php?keyword='+$('#keywords').val());
    })
})