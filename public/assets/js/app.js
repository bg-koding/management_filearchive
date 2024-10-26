

$(document).ready(function() {

    //  Top menu settings
    $('.btn-nav-toggle').click(function() {
        $('.nabars-bottom-menu').toggleClass('show');
    });

    // Datatables
    var table = $('.dataTable').DataTable({
        "paging": true,
        "info": false,
        "searching": true,
        "lengthChange": true,
        "ordering": false,
        "responsive": true,
        "pagingType": "simple_numbers",
        "placeholder": "Cari data ...",
        "language": {
            "search": "Cari",
            "lengthMenu": "Tampilkan _MENU_ data",
            "zeroRecords": "Tidak ada data untuk ditampilkan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
            "infoFiltered": "(Difilter dari _MAX_ entri)",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": ">",
                "previous": "<"
            }
        }
    });

    // // Fungsi untuk mengisi data ke dalam tabel
    // function formData() {
    //     var isi = '';
    //     for (let index = 0; index < 1000; index++) {
    //         isi += `
    //             <tr>
    //                 <td>${index + 1}</td>
    //                 <td>John Doe</td>
    //                 <td>123 Main St</td>
    //                 <td>123456</td>
    //                 <td>Laki-laki</td>
    //                 <td>Aktif</td>
    //                 <td>
    //                     <div class="btn-group btn-group-sm">
    //                         <button type="button" class="btn btn-sm btn-outline-warning">
    //                             <i class="bi bi-eye"></i>
    //                         </button>
    //                         <button type="button" class="btn btn-sm btn-outline-primary">
    //                             <i class="bi bi-pencil"></i>
    //                         </button>
    //                         <button type="button" class="btn btn-sm btn-outline-danger">
    //                             <i class="bi bi-trash"></i>
    //                         </button>
    //                     </div>
    //                 </td>
    //             </tr>
    //         `;
    //     }
    //     // Menambahkan isi ke dalam DataTable
    //     $('.bodyTable').html(isi);
    //     // Mengupdate DataTable setelah data diisi
    //     table.rows.add($('.bodyTable tr')).draw();
    // }

    // // Memanggil fungsi untuk mengisi data
    // formData();

});
