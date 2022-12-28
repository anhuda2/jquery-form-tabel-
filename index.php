<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <br>
    <div class="container">
        <h2 class="alert alert-success text-center"><img src="foto.png" alt="Foto" style="display: block; margin: auto;">
            Form Pendaftaran   
        </h2>

        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <form id="form-input">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">TTL</label>
                                <input type="text" class="form-control" id="ttl" name="ttl"
                                    placeholder="Tempat, dd-mm-yyyy">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Unit</label>
                                <input type="text" class="form-control" id="unit" name="unit"
                                    placeholder="Shigor/Mahasiswa">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Jenis Kelamin</label>
                                <select name="gender" class="form-control" id="gender">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Alamat Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nomor HP</label>
                                <input type="text" class="form-control" id="nomor-hp" name="nomor-hp"
                                    placeholder="No Hp">
                            </div>

                            <button type="submit" id="tombol-simpan" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div id="tabeldata">

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>

    <script>
        $(document).ready(function () {
            update();
        });
        $("#tombol-simpan").click(function () {
            //validasi form
            $('#form-input').validate({
                rules: {
                    nama: {
                        required: true
                    },
                    ttl: {
                        required: true
                    },
                    unit: {
                        required: true
                    },
                    gender: {
                        required: true
                    },
                    alamat: {
                        required: true
                    },
                    'nomor-hp': {
                        required: true
                    }
                },
                //jika validasi sukses maka lakukan
                submitHandler: function (form) {
                    $.ajax({
                        type: 'POST',
                        url: "simpan.php",
                        data: $('#form-input').serialize(),
                        success: function () {
                            //setelah simpan data, update data terbaru
                            update()
                        }
                    });
                    //kosongkan form nama dan jurusan
                    document.getElementById("nama").value = "";
                    document.getElementById("ttl").value = "";
                    document.getElementById("unit").value = "";
                    document.getElementById("gender").value = "";
                    document.getElementById("alamat").value = "";
                    document.getElementById("nomor-hp").value = "";
                    return false;
                }
            });
        });

        //fungsi tampil data
        function update() {
            $.ajax({
                url: 'data.php',
                type: 'get',
                success: function (data) {
                    $('#tabeldata').html(data);
                }
            });
        }
    </script>
    <style>
        body {
            font-family: 'Lato', sans-serif;"
        }
    </style>
</body>


</html>