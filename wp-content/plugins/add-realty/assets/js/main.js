document.addEventListener("DOMContentLoaded", function (event) {

    if (document.querySelector('#create_realty')) {
        document.querySelector('#create_realty').addEventListener('click', function (e) {

            e.preventDefault();
            if (window.FormData != undefined) {

                document.querySelector('#result').innerHTML = '<div class="loader-bg"><div class="lds-ripple"><div></div><div></div></div></div>';

                var formData = new FormData();
                formData.append('action', 'create_realty');

                let realty_name = document.querySelector('#realty_name');
                let square = document.querySelector('#square');
                let price = document.querySelector('#price');
                let living_space = document.querySelector('#living_space');
                let floor = document.querySelector('#floor');
                let adress_create = document.querySelector('#adress_create');

                let type_of_realty = document.querySelector('#type_of_realty');
                let town_of_realty = document.querySelector('#town_of_realty');
                let thumb_of_realty = document.querySelector('#thumb_of_realty');

                realty_name.parentElement.classList = '';
                square.parentElement.classList = '';
                price.parentElement.classList = '';
                living_space.parentElement.classList = '';
                floor.parentElement.classList = '';
                adress_create.parentElement.classList = '';
                type_of_realty.parentElement.classList = '';
                town_of_realty.parentElement.classList = '';
                thumb_of_realty.parentElement.classList = '';

                if (required(realty_name.value)) {
                    if (allLetter(realty_name.value)) {
                        formData.append('realty_name', realty_name.value);
                    } else {
                        realty_name.parentElement.classList = 'error';
                        document.querySelector('#result').innerHTML = 'Неверный формат названия';
                        realty_name.focus();
                        return false;
                    }
                } else {
                    realty_name.parentElement.classList = 'error';
                    document.querySelector('#result').innerHTML = 'Укажите название недвижимости';
                    realty_name.focus();
                    return false;
                }

                if (required(square.value)) {
                    if (CheckDecimal(square.value)) {
                        formData.append('square', square.value);
                    } else {
                        square.parentElement.classList = 'error';
                        document.querySelector('#result').innerHTML = 'Неверный формат площади';
                        square.focus();
                        return false;
                    }
                } else {
                    square.parentElement.classList = 'error';
                    document.querySelector('#result').innerHTML = 'Укажите площадь недвижимости';
                    square.focus();
                    return false;
                }

                if (required(price.value)) {
                    if (CheckDecimal(price.value)) {
                        formData.append('price', price.value);
                    } else {
                        price.parentElement.classList = 'error';
                        document.querySelector('#result').innerHTML = 'Неверный формат стомости';
                        price.focus();
                        return false;
                    }
                } else {
                    price.parentElement.classList = 'error';
                    document.querySelector('#result').innerHTML = 'Укажите стомость недвижимости';
                    price.focus();
                    return false;
                }

                if (required(living_space.value)) {
                    if (CheckDecimal(living_space.value)) {
                        formData.append('living_space', living_space.value);
                    } else {
                        living_space.parentElement.classList = 'error';
                        document.querySelector('#result').innerHTML = 'Неверный формат жилой площади';
                        living_space.focus();
                        return false;
                    }
                } else {
                    living_space.parentElement.classList = 'error';
                    document.querySelector('#result').innerHTML = 'Укажите жилую площадь';
                    living_space.focus();
                    return false;
                }

                if (required(floor.value)) {
                    if (allnumeric(floor.value)) {
                        formData.append('floor', floor.value);
                    } else {
                        floor.parentElement.classList = 'error';
                        document.querySelector('#result').innerHTML = 'Неверный формат этажа';
                        floor.focus();
                        return false;
                    }
                } else {
                    floor.parentElement.classList = 'error';
                    document.querySelector('#result').innerHTML = 'Укажите этаж';
                    floor.focus();
                    return false;
                }

                if (required(adress_create.value)) {
                    if (allLetter(adress_create.value)) {
                        formData.append('adress_create', adress_create.value);
                    } else {
                        adress_create.parentElement.classList = 'error';
                        document.querySelector('#result').innerHTML = 'Неверный формат адреса';
                        adress_create.focus();
                        return false;
                    }
                } else {
                    adress_create.parentElement.classList = 'error';
                    document.querySelector('#result').innerHTML = 'Укажите адрес';
                    adress_create.focus();
                    return false;
                }

                if (required(type_of_realty.value)) {
                    formData.append('type_of_realty', type_of_realty.value);
                } else {
                    type_of_realty.parentElement.classList = 'error';
                    document.querySelector('#result').innerHTML = 'Укажите тип недвижимости';
                    type_of_realty.focus();
                    return false;
                }
                
                if (required(town_of_realty.value)) {
                    formData.append('town_of_realty', town_of_realty.value);
                } else {
                    town_of_realty.parentElement.classList = 'error';
                    document.querySelector('#result').innerHTML = 'Укажите город недвижимости';
                    town_of_realty.focus();
                    return false;
                }
                
                if (required(thumb_of_realty.value)) {
                    formData.append('thumb_of_realty', thumb_of_realty.value);
                } else {
                    thumb_of_realty.parentElement.classList = 'error';
                    document.querySelector('#result').innerHTML = 'Добавьте изображения недвижимости';
                    thumb_of_realty.focus();
                    return false;
                }

                var create_request = new XMLHttpRequest();
                create_request.open('POST', "/wp-admin/admin-ajax.php", true);

                create_request.send(formData);

                create_request.onload = function () {
                    if (this.status >= 200 && this.status < 400) {
                        // Success!
                        if (undefined != this.response && '' != this.response) {
                            var resp = JSON.parse(this.response);

                            if (resp.link != true) {
                                document.querySelector('#result').innerHTML = '<a href="' + resp.link + '">Смотреть ' + document.querySelector('#realty_name').value + '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="40" height="20" fill="#0027ff"><path d="M502.6 278.6l-128 128c-12.51 12.51-32.76 12.49-45.25 0c-12.5-12.5-12.5-32.75 0-45.25L402.8 288H32C14.31 288 0 273.7 0 255.1S14.31 224 32 224h370.8l-73.38-73.38c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l128 128C515.1 245.9 515.1 266.1 502.6 278.6z"/></svg></a>';
                                realty_name.value = '';
                                square.value = '';
                                price.value = '';
                                living_space.value = '';
                                floor.value = '';
                                adress_create.value = '';
                                type_of_realty.value = '';
                                town_of_realty.value = '';
                                thumb_of_realty.value = '';
                            } else {
                                document.querySelector('#result').innerHTML = 'Что-то пошло не так...попробуйте снова';
                            }
                        } else{
                            document.querySelector('#result').innerHTML = 'Что-то пошло не так...попробуйте снова';
                        }
                    } else{
                        document.querySelector('#result').innerHTML = 'Что-то пошло не так...попробуйте снова';
                    }
                };
            }
        })
    }

    function allLetter(input) {
        var letters = /^[0-9А-Яа-яA-Za-z]+$/;

        if (input.match(letters)) {
            return true;
        } else {
            return false;
        }
    }

    function required(input) {
        if (input.length == 0) {
            return false;
        }
        return true;
    }

    function allnumeric(input) {
        var numbers = /^[0-9]+$/;
        if (input.match(numbers)) {
            return true;
        }
        else {
            return false;
        }
    }

    function CheckDecimal(inputtxt){ 
        var decimal =  /^[-+]?[0-9]+\.[0-9]+$/; 
        if(inputtxt.match(decimal)){ 
            return true;
        } else { 
            return false;
        }
    } 
})