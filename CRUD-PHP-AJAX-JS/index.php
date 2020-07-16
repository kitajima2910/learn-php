<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMPLOYEES</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <form onsubmit="return addData();">
                    <div class="mb-3">
                        <label for="txtFullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="txtFullName" required placeholder="Enter full name">
                    </div>
                    <div class="mb-3">
                        <label for="txtEmail" class="form-label">Email</label>
                        <input type="text" class="form-control" id="txtEmail" required placeholder="Enter email" pattern="^[\w]{2,}@[\w]{2,}(\.[\w]{2,}){1,2}$">
                    </div>
                    <div class="mb-3">
                        <label for="txtAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="txtAddress" required placeholder="Enter address">
                    </div>
                    <button type="submit" id="btnAdd" class="btn btn-primary">Add</button>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tblEmployees"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script>
        function ajaxTable() {
            var ajax = new XMLHttpRequest();
            ajax.open('GET', 'get-data.php', true);
            ajax.send();

            ajax.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    let data = JSON.parse(this.responseText);

                    let html = '';
                    for (let i = 0; i < data.length; i++) {
                        html += '<tr>';
                        html += '<td>' + (i + 1) + '</td>';
                        html += '<td>' + data[i].full_name + '</td>';
                        html += '<td>' + data[i].email + '</td>';
                        html += '<td>' + data[i].address + '</td>';
                        html += `<td>
                                    <button type="button" id="btnDelete" onclick="deleteDate(${data[i].id});" class="btn btn-danger">Delete</button>
                                </td>`;
                        html += '</tr>';
                    }

                    document.getElementById('tblEmployees').innerHTML = html;
                }
            };
        }

        ajaxTable();



        function addData() {
            let txtFullName = document.getElementById('txtFullName').value;
            let txtEmail = document.getElementById('txtEmail').value;
            let txtAddress = document.getElementById('txtAddress').value;

            let ajax = new XMLHttpRequest();
            ajax.open('POST', 'save-data.php', true);
            ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            ajax.send('txtFullName=' + txtFullName + '&txtEmail=' + txtEmail + '&txtAddress=' + txtAddress + '&btnAdd=');

            ajax.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    ajaxTable();
                }
            };

            return false;
        }

        function deleteDate(id) {
            if (confirm('Are you sure ?')) {
                let ajax = new XMLHttpRequest();
                ajax.open('POST', 'delete-data.php', true);
                ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                ajax.send(`id=${id}`);

                ajax.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        ajaxTable();
                    }
                };
            }
        }
    </script>
</body>

</html>