const base_url = 'http://127.0.0.1:8000/';

$(document).on('click', '#btn-login', function() {
    $(this).html(`
    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-lightBlue-500 group-hover:text-lightBlue-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
    <svg id="spinner-login-btn" class="animate-spin h-5 w-5 mr-3 bg-white-600" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            width="40px" height="40px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"
                            style="margin-right:-2px;display:block;background-repeat-y:initial;background-repeat-x:initial;">
                            <circle cx="50" cy="50" r="29" stroke-width="8" stroke="#ffffff"
                                stroke-dasharray="45.553093477052 45.553093477052" fill="none"
                                stroke-linecap="round" transform="matrix(1,0,0,1,0,0)"
                                style="transform:matrix(1, 0, 0, 1, 0, 0);"></circle>
                        </svg>
                        `);
    setTimeout(() => {
      $(this).html(`<span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-lightBlue-500 group-hover:text-lightBlue-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign in
                        `)
    }, 3000);
})

function onChangeText(element) {
    $('#error-message').remove();
    $(element).removeClass('border-red-300');
    $(element).addClass('border-gray-300');
}

function checkValue() {
    // select
    let select_kategori = $('#kategori').val();
    let select_status = $('#status').val();
    let select_prodi = $('#prodi').val();
    console.log($('#prodi-select').data('visible'));


    // input
    let brand = $('#brand_name').val();
    let deskripsi = $('#deskripsi').val();
    let alamat = $('#alamat').val();
    let ketua = $('#ketua').val();
    let no_whatsapp = $('#no_whatsapp').val();

    $('input, select, textarea').each(function() {
        const val = $(this).val();
        const id = $(this).attr('id');
        if (id == 'website' || id == 'instagram') {
            return;
        } else {
            if (val === null || val === '') {
                $(this).removeClass('border-gray-300');
                $(this).addClass('border-red-300');
            } else {
                $(this).removeClass('border-red-300');
                $(this).addClass('border-gray-300');
            }
        }

    })

    if (select_kategori && select_status && brand !== '' &&
        deskripsi !== '' && alamat !== '' && ketua !== '' && no_whatsapp !== '') {
            // console.log($('#prodi-select').data('visible'));
            const is_show = $('#prodi-select').data('visible');
            if (is_show) {
                if (select_prodi) {
                    $('#btn-continue').removeAttr('disabled');
                } else {
                    $('#btn-continue').attr('disabled', true);
                }
            }
            $('#btn-continue').removeAttr('disabled');
    } else {
        $('#btn-continue').attr('disabled', true);
    }
}

function regexNumOnly(element) {
    const regex = /[^0-9]/g;
    element.value = element.value.replace(regex, '');
}

async function prodiSelect (element){
    const status = $(element).val();
    if (status == 1) {
        const prodi = await fetch(base_url + 'api/getProdi',{
            method: 'POST'
        })
        .then(response => response.json());
        let select = `<div class="grid grid-cols-3 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="prodi" class="block text-sm font-me dium text-gray-700">Asal
                                Prodi*</label>
                            <select id="prodi" name="prodi" onchange="checkValue(this)"
                                class="mt-1 block w-full py-2 px-3 border border-red-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-lightBlue-500 focus:border-lightBlue-500 sm:text-sm">
                                <option value="0" disabled selected>Pilih Prodi</option>`;
        prodi.forEach(response => {
            select += `<option value="${response.id_prodi}">${response.nama_prodi}</option>`
        });
        select += `</select>
                    </div>
                </div>`;
        $('#prodi-select').html(select);
        $('#prodi-select').data('visible', 'true');
    } else {
        $('#prodi-select').html('');
        $('#prodi-select').data('visible', 'false');
    }
}

$(document).on('click', '#btn-continue', function() {
    $('#form_regis').addClass('animate__fadeOutRight');
    setTimeout(() => {
        $('#form_register').submit();
        $('#form_regis').remove();
    }, 1500);
})

function showModal(){
    $('#modal-confirm').removeClass('hidden');
}

function closeModal(){
    $('#modal-confirm').addClass('hidden');
}

function submitForm(){
    $('#form-user').submit();
}

function regexMail(email){
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function checkForm(){
    const email = $('#emailInput').val();
    const password = $('#passwordInput').val();
    const conf_pass = $('#conf_passwordInput').val();

    if (regexMail(email) && password == conf_pass && password != '' && conf_pass != '') {
        $('#button-register').removeAttr('disabled');
    } else {
        $('#button-register').attr('disabled', true);
    }
}

async function checkEmail(element){
    const input = $(element).val();
    if (!regexMail(input)) {
        return false;
    }
    const getEmail = await fetch(base_url + 'api/getEmail',{
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `email=${input}`
    }).then(response => response);
    if (getEmail.status === 200) {
        $('#error_email').removeClass('hidden');
        $(element).removeClass('border-gray-300').addClass('border-red-300');
    } else {
        $('#error_email').addClass('hidden');
        $(element).removeClass('border-red-300').addClass('border-gray-300');
    }
    // console.log(await getEmail.json());
}