const notifikasi = $('#info-data').data('infodata');

$('.hapusdata').on('click',function(e){
    e.preventDefault();
    let nama = $(this).data('namaaa');
    let nim = $(this).data('nimmm');
    getLink = $(this).attr('href');
    Swal.fire({
        icon: 'question',
        title: 'Yakin Menghapus Data Ini?',
        text: 'Data dengan nim "'+nim+'" Yang Bernama "'+nama+'" Akan Dihapus Permanen',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus!'
    }).then((result)=>{
        if (result.isConfirmed){
            document.location.href=getLink;
        }
    })
})
$(document).ready(function(){
    
    if(notifikasi == 'Disimpan' || notifikasi == 'Diubah' || notifikasi =='Dihapus'){
        Swal.fire({
            icon: 'success',
            title: 'Berhasil !',
            text: 'Data Berhasil '+notifikasi,
        })
    } else if (notifikasi =='Gagal Disimpan' || notifikasi=='Gagal Diubah' || notifikasi =='Gagal Dihapus') {
        Swal.fire({
            icon: 'error',
            title: 'Data '+notifikasi,
            text: 'Periksa Query atau Database',
        })
    } else if (notifikasi =='Tidak Ada Yang Diubah') {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Disimpan',
            text: 'Data '+notifikasi,
        })
    }
    
})

