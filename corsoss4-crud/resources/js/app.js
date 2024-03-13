import './bootstrap';
import "../scss/app.scss";

import * as bootstrap from "bootstrap";

import 'laravel-datatables-vite';
import jQuery from 'jquery';
window.$ = jQuery;

import Swal from 'sweetalert2'

$(function() {
    $('body').on('click', '.delete', function() {
        var id = $(this).data('id');
        var route = $(this).data('route'); // Leggi l'URL della route dall'attributo data-route
        Swal.fire({
            title: 'sei sicuro?',
            text: 'Non potrai recuperare il prodotto!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Si, cancellalo!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: route, // Utilizza l'URL della route
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        // Swal.fire(
                        //     'Cancellato!',
                        //     'Prodotto cancellato.',
                        //     'success'
                        // );
                        // Ricarica la DataTables
                        $('#sstable').DataTable().ajax.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });
    });

});
