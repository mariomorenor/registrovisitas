import Uppy from '@uppy/core';
import Dashboard from '@uppy/dashboard';
import XHR from '@uppy/xhr-upload';

import '@uppy/core/dist/style.min.css';
import '@uppy/dashboard/dist/style.min.css';

const url = window.origin;
const token = $("#token-form input").val();
const code = $("#code").val();

const uppy = new Uppy({
    meta: {
        _token: token,
        code
    }
})
    .use(Dashboard, { trigger: '#upload', target: '#pre_report' })
    .use(XHR, { endpoint: `${url}/files/upload` });

uppy.on('complete', (result) => {
    window.location.reload();
});