import axios from "axios";
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Swal from "sweetalert2";


let btn_delete_attachment = $(".btn_delete_attachment");

btn_delete_attachment.on("click", (evt) => {
    let attachment_id = $(evt.currentTarget).attr("data-attachment-id");
    const token = $("#token-form input").val();
    const url = `${window.origin}/attachments/${attachment_id}`

    Swal.fire({
        icon: "warning",
        title: "Eliminando...",
        text: "¿Está seguro?",
        showCancelButton: true,
    }).then((res) => {
        if (res.value) {
            axios.delete(url, {
                data: {
                    _token: token
                }
            }).finally((res) => {
                window.location.reload();
            });
        }
    })

})
