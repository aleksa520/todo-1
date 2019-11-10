<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="./application/style/style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="index.js"></script>
</head>
<body>
<div class="iteh_header">
    <div class="iteh_header_container">
    <div onclick="showModal('newContact')" class="iteh_button">Add new contact</div>
    <div onclick="showModal('editUser')" class="iteh_button">Edit your account</div>
        <div class="iteh_search_container">
            <input placeholder="Search" class="iteh_header_search"/>
        </div>
    <div onclick="logOut()" class="iteh_button so">Sign out</div>
    </div>
</div>
<div class="iteh_home">
    <div class="iteh_contact_table">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody class="iteh_contact_table_body">
            </tbody>
</table>
</div>
</div>
<script>

</script>
</body>
</html>