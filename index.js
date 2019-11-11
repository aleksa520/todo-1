function renderData(search) {
    $('tbody').empty();
    if (search) {
        $.ajax({
            url: './application/controllers/servicies/Contact.php',
            type: 'POST',
            data: {inputText: search},
            success: function (data) {
                console.log(data);
                let formedData = JSON.parse(data);
                formedData.forEach((row) => {
                    $('tbody').append("<tr><td>" + row['id'] + "</td><td>" + row['first_name'] + "</td><td>" + row['last_name'] + "</td><td>" + row['birth_date'] + "</td><td>"
                        + row['email'] + "</td><td>" + row['phone'] + "</td><td><div data-id='\"" + row['id'] + "\"' onclick='handleModal(\"edit\", "+ row.id +")' class='iteh_button edit_contacts'>Edit </div></td>" +
                        "<td><div data-id='\"" + row['id'] + "\"' onclick='handleModal(\"delete\", "+ row.id +")' class='iteh_button delete_contacts'>Delete </div></td>")
                })
            }
        })
    } else {
        $.ajax({
            url: './application/controllers/servicies/Contact.php',
            type: 'GET',
            success: function (data) {
                let formedData = JSON.parse(data);
                formedData.forEach((row) => {
                    $('tbody').append("<tr><td>" + row['id'] + "</td><td>" + row['first_name'] + "</td><td>" + row['last_name'] + "</td><td>" + row['birth_date'] + "</td><td>"
                        + row['email'] + "</td><td>" + row['phone'] + "</td><td><div data-id='\"" + row['id'] + "\"' onclick='handleModal(\"edit\", "+ row.id +")' class='iteh_button edit_contacts'>Edit </div></td>" +
                        "<td><div  onclick='handleModal(\"delete\", "+ row.id +")' class='iteh_button delete_contacts'>Delete </div></td>")
                })

            }
        })
    }
}

function formSubmitOnAddingContact(event) {
    var contact = {};
    event.preventDefault();
    contact['first_name'] = $('.first_name').val();
    contact['last_name'] = $('.last_name').val();
    contact['date'] = $('.date').val();
    contact['email'] = $('.email').val();
    contact['phone'] = $('.phone').val();


    $.ajax({
        url: "./application/controllers/servicies/Contact.php",
        type: 'POST',
        data: {contact: contact},
        success: function (result) {
            window.location.reload();
        }
    });
}

function formSubmitonEdingUser(event) {
    event.preventDefault();
    var user = {};
    user['first_name'] = $('.first_name').val();
    user['last_name'] = $('.last_name').val();
    user['username'] = $('.username').val();
    user['password'] = $('.password').val();


    $.ajax({
        url: "./application/controllers/servicies/User.php",
        type: 'PUT',
        data: JSON.stringify(user),
        success: function (result) {
            window.location.reload();
        }
    });
}

function formSubmitOnEditingContact(event, id) {
    event.preventDefault();
    var contact = {};
    contact['id'] = id;
    contact['first_name'] = $('.first_name').val();
    contact['last_name'] = $('.last_name').val();
    contact['birth_date'] = $('.date').val();
    contact['email'] = $('.email').val();
    contact['phone'] = $('.phone').val();

    $.ajax({
        url: "./application/controllers/servicies/Contact.php",
        type: 'PUT',
        data: JSON.stringify(contact),
        success: function (result) {
            window.location.reload();
        }
    });
}

function sortByName(){
    $('tbody').empty();
    $.ajax({
        url: './application/controllers/servicies/Contact.php',
        type: 'POST',
        data: {sort: true},
        success: function (data) {
            let formedData = JSON.parse(data);
            formedData.forEach((row) => {
                $('tbody').append("<tr><td>" + row['id'] + "</td><td>" + row['first_name'] + "</td><td>" + row['last_name'] + "</td><td>" + row['birth_date'] + "</td><td>"
                    + row['email'] + "</td><td>" + row['phone'] + "</td><td><div data-id='\"" + row['id'] + "\"' onclick='handleModal(\"edit\", "+ row.id +")' class='iteh_button edit_contacts'>Edit </div></td>" +
                    "<td><div  onclick='handleModal(\"delete\", "+ row.id +")' class='iteh_button delete_contacts'>Delete </div></td>")
            })

        }
    })
}

function deleteContact(id) {
    console.log(id);
    $.ajax({
        url: "./application/controllers/servicies/Contact.php?id=" +id,
        type: 'DELETE',
        success: function (data) {
            console.log(data);
            window.location.reload();
        }
    })
}

function handleModal(param,id){
    console.log(id);
    if(param === 'edit'){
        showModal('editContact',id);
    }else{
        showModal('deleteContact', id);
    }
}

function showModal(param, id = null) {
    var modal = '';
    var userInfo = {};
    var contactInfo = {};
    switch (param) {
        case 'newContact':
            modal = '<div class="iteh_modal"><div class="iteh_modal_content"><div onclick="hideModal()" class="iteh_modal_content_close">&#10005;</div>' +
                '<div class="iteh_modal_container">' +
                '<form action="#" method="post">' +
                '<div class="iteh_modal_container_input"><div>First Name:</div> <input name="first_name" class="iteh_login_input first_name"/></div>' +
                '<div class="iteh_modal_container_input"><div>Last Name:</div> <input class="iteh_login_input last_name"/></div>' +
                '<div class="iteh_modal_container_input"><div>Birth date: </div><input class="iteh_login_input date" type="date"/></div>' +
                '<div class="iteh_modal_container_input"><div>Email: </div><input class="iteh_login_input email" type="email"/></div>' +
                '<div class="iteh_modal_container_input"><div>Phone: </div><input class="iteh_login_input phone" type="text"/></div>' +

                '<input class="iteh_login_button" type="submit" onclick="formSubmitOnAddingContact(event)" value="Submit"></form></div><div class="iteh_modal_helper"></div>' +
                '</div></div>';
            break;
        case 'editUser':
            modal = '<div class="iteh_modal"><div class="iteh_modal_content"><div onclick="hideModal()" class="iteh_modal_content_close">&#10005;</div>' +
                '<div class="iteh_modal_container">' +
                '<form method="post">' +
                '<div class="iteh_modal_container_input"><div>First Name:</div> <input value="" name="first_name" class="iteh_login_input first_name"/></div>' +
                '<div class="iteh_modal_container_input"><div>Last Name:</div> <input class="iteh_login_input last_name"/></div>' +
                '<div class="iteh_modal_container_input"><div>Username: </div><input class="iteh_login_input username" type="text"/></div>' +
                '<div class="iteh_modal_container_input"><div>Password: </div><input class="iteh_login_input password" type="password"/></div>' +
                '<input class="iteh_login_button" type="submit" onclick="formSubmitonEdingUser(event)" value="Submit"></form></div><div class="iteh_modal_helper"></div>' +
                '</div></div>'
            $.ajax({
                url: "./application/controllers/servicies/User.php",
                type: 'GET',
                success: function (result) {
                    userInfo = JSON.parse(result);
                    $('.first_name').val(userInfo['first_name'])
                    $('.last_name').val(userInfo['last_name'])
                    $('.username').val(userInfo['username'])
                    $('.password').val(userInfo['password'])
                }
            });
            break;
        case 'editContact':
            modal = '<div class="iteh_modal"><div class="iteh_modal_content"><div onclick="hideModal()" class="iteh_modal_content_close">&#10005;</div>' +
                '<div class="iteh_modal_container">' +
                '<form action="#" method="post">' +
                '<div class="iteh_modal_container_input"><div>First Name:</div> <input name="first_name" class="iteh_login_input first_name"/></div>' +
                '<div class="iteh_modal_container_input"><div>Last Name:</div> <input class="iteh_login_input last_name"/></div>' +
                '<div class="iteh_modal_container_input"><div>Birth date: </div><input class="iteh_login_input date" type="date"/></div>' +
                '<div class="iteh_modal_container_input"><div>Email: </div><input class="iteh_login_input email" type="email"/></div>' +
                '<div class="iteh_modal_container_input"><div>Phone: </div><input class="iteh_login_input phone" type="text"/></div>' +

                '<input class="iteh_login_button" type="submit" onclick="formSubmitOnEditingContact(event, '+ id + ' )" value="Submit"></form></div><div class="iteh_modal_helper"></div>' +
                '</div></div>';
            $.ajax({
                url: "./application/controllers/servicies/Contact.php?id=" + id,
                type: 'GET',
                success: function (result) {
                    contactInfo = JSON.parse(result);
                    $('.first_name').val(contactInfo[0]['first_name'])
                    $('.last_name').val(contactInfo[0]['last_name'])
                    $('.date').val(contactInfo[0]['birth_date'].trim())
                    $('.email').val(contactInfo[0]['email'])
                    $('.phone').val(contactInfo[0]['phone'])
                }
            });
            break;

        case 'deleteContact':
            modal = '<div class="iteh_modal_delete">' +
                '<span class="iteh_label">Are you sure you want to delete this contact ?</span>' +
                '<div class="iteh_button_toolbar"><div class="iteh_button submit_contacts" onclick="deleteContact('+id+')">Yes</div><div class="iteh_button delete_contacts" onclick="hideModalDelete()">No</div></div></div>'
    }
    $('body').append(modal);
}

function hideModal() {
    $('.iteh_modal').remove();
}

function hideModalDelete() {
    $('.iteh_modal_delete').remove();

}

function logOut() {
    document.location.href = 'http://localhost/itehdomaci1/index.php'
    $.ajax({
        url: "./application/controllers/servicies/Logs.php",
        success: function () {
        }
    })
}


$('document').ready(function () {
    renderData();
        $('.iteh_header_search').keyup(function () {
                let inputText = $(this).val();
                if (inputText != '') {
                    renderData(inputText);
                }else{
                    renderData();
                }
            }
        )
    })
