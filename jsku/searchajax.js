

var keyword = document.getElementById('keywords');
var tombolCari = document.getElementById('search');
var table = document.getElementById('bungkus-table');

//Event ketika user mengetikan sesuatu di input pencarian
keyword.addEventListener('keyup',function(){
    // membuat objek baru ajax 
    var xhr = new XMLHttpRequest();
    //mengecek kesiapan ajax 
    xhr.onreadystatechange = function(){
        if ( xhr.readyState == 4 && xhr.status == 200){
            // isi content pada id table di index.html
            table.innerHTML = xhr.responseText;
        };
    }
    //eksekusi ajax => maksud true pada parameter terakhir menandakan
    //bahwa akan dieksekusi secara asycnchronus;
    xhr.open('GET', 'mahasiswa.php?keyword='+keyword.value, true);
    xhr.send();
});
    
    