@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        <h3 class="text-left text-dark">Simulation</h3>
        <hr>
        <div class="card">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr class="text-center">
                    <th>No</th>
                    <th>Permintaan / Hari</th>
                    <th>Frekuensi Permintaan</th>
                    <th>Distribusi Densitas</th>
                    <th>CDF</th>
                    <th>Tag Number</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td><input type="number" value="4" id="permintaan1" class="form-control"></td>
                    <td><input type="number" value="10" id="frekuensi1" class="form-control"></td>
                    <td id="distribusi1"></td>
                    <td id="cdf1"></td>
                    <td id="tag1"></td>
                </tr>
                <tr class="text-center">
                    <td>2</td>
                    <td><input type="number" value="5" id="permintaan2" class="form-control"></td>
                    <td><input type="number" value="17" id="frekuensi2" class="form-control"></td>
                    <td id="distribusi2"></td>
                    <td id="cdf2"></td>
                    <td id="tag2"></td>
                </tr>
                <tr class="text-center">
                    <td>3</td>
                    <td><input type="number" value="6" id="permintaan3" class="form-control"></td>
                    <td><input type="number" value="23" id="frekuensi3" class="form-control"></td>
                    <td id="distribusi3"></td>
                    <td id="cdf3"></td>
                    <td id="tag3"></td>
                </tr>
                <tr class="text-center">
                    <td>4</td>
                    <td><input type="number" value="7" id="permintaan4" class="form-control"></td>
                    <td><input type="number" value="18" id="frekuensi4" class="form-control"></td>
                    <td id="distribusi4"></td>
                    <td id="cdf4"></td>
                    <td id="tag4"></td>
                </tr>
                <tr  class="text-center">
                    <td>5</td>
                    <td><input type="number" value="8" id="permintaan5" class="form-control"></td>
                    <td><input type="number" value="5" id="frekuensi5" class="form-control"></td>
                    <td id="distribusi5"></td>
                    <td id="cdf5"></td>
                    <td id="tag5"></td>
                </tr>
                <tr  class="text-center">
                    <td>6</td>
                    <td><input type="number" value="9" id="permintaan6" class="form-control"></td>
                    <td><input type="number" value="27" id="frekuensi6" class="form-control"></td>
                    <td id="distribusi6"></td>
                    <td id="cdf6"></td>
                    <td id="tag6"></td>
                </tr>
                <tr  class="text-center">
                    <td class="font-weight-bold" colspan="2">Total</td>
                    <td class="font-weight-bold" id="totalFrekuensi"></td>
                    <td class="font-weight-bold" id="totalDistribusi"></td>
                    <td class="font-weight-bold"></td>
                    <td class="font-weight-bold"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                <table id="table2" class="table table-bordered">
                    <thead class="thead-light">
                        <tr  class="text-center">
                            <th>Parameter Metode Kongruensial Linier</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody  class="text-center">
                        <tr>
                            <td>Z0</td>
                            <td><input type="number" value="215041" id="z0" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>a</td>
                            <td><input type="number" value="19" id="a" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>m</td>
                            <td><input type="number" value="128" id="m" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>c</td>
                            <td><input type="number" value="237" id="c" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Jumlah simulasi</td>
                            <td><input type="number" value="20" id="jumlahSimulasi" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <div class="text-center my-4">
                    <button id="runSimBtn" class="btn btn-primary">Run Simulation</button>
                    <button id="refreshBtn" class="btn btn-danger ml-2">Reset Simulation</button>
                 
                </div>
            </div>
            <div class="col-md-6">
                 <div class="card">
                <table id="table3" class="table table-bordered">
                    <thead class="thead-light">
                        <tr  class="text-center">
                            <th>No</th>
                            <th>Hari</th>
                            <th>Z</th>
                            <th>R</th>
                            <th>Permintaan / Hari</th>
                        </tr>
                    </thead>
                    <tbody id="t3">
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Pastikan Anda telah memasukkan jQuery ke halaman Anda -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        function refreshPage() {
            location.reload();
        }

        function runSimulation() {
            var permintaan = [];
            var frekuensi = [];
            var distribusi = [];
            var cdf = [];
            var tag = [];

            // Mendapatkan input dari Tabel Pertama
            for (var i = 1; i <= 6; i++) {
                var permintaanInput = $('#permintaan' + i).val();
                var frekuensiInput = $('#frekuensi' + i).val();
                permintaan.push(parseFloat(permintaanInput));
                frekuensi.push(parseFloat(frekuensiInput));
            }

            // Menghitung Distribusi dan CDF
            var totalFrekuensi = frekuensi.reduce((a, b) => a + b, 0);
            for (var i = 0; i < 6; i++) {
                distribusi.push(frekuensi[i] / totalFrekuensi);
                cdf.push(distribusi.reduce((a, b, index) => (index <= i ? a + b : a), 0));
            }

            // Mengisi Tabel Pertama dengan hasil perhitungan
            for (var i = 1; i <= 6; i++) {
                $('#distribusi' + i).text(distribusi[i - 1].toFixed(2));
                $('#cdf' + i).text(cdf[i - 1].toFixed(2));
                if (i < 2) {
                    $('#tag' + i).text((i === 1 ? '0.00' : cdf[i - 2].toFixed(2)) + '≤ R ≤' +
                        (i === 6 ? '1.00' : cdf[i - 1].toFixed(2)));
                } else {
                    $('#tag' + i).text((i === 1 ? '0.00' : cdf[i - 2].toFixed(2)) + '≤ R ≤' +
                        (i === 6 ? '1.00' : cdf[i - 1].toFixed(2)));
                }
            }

            // Menambahkan total frekuensi permintaan
            $('#totalFrekuensi').text(totalFrekuensi);

            // Menambahkan total distribusi densitas
            var totalDistribusi = distribusi.reduce((a, b) => a + b, 0);
            $('#totalDistribusi').text(totalDistribusi.toFixed(2));

            var z0 = parseFloat($('#z0').val());
            var a = parseFloat($('#a').val());
            var m = parseFloat($('#m').val());
            var c = parseFloat($('#c').val());
            var jumlahSimulasi = parseInt($('#jumlahSimulasi').val());

            var z = z0;
            var table3Body = $('#t3');
            table3Body.empty();

            // Menjalankan simulasi Monte Carlo
            for (var i = 0; i <= jumlahSimulasi; i++) {
                if (i < 1) {
                    // Menghasilkan nilai z baru menggunakan metode Kongruensial Linier
                    z = (a * z + c) % m;
                } else {
                    var row = $('<tr  class="text-center">');
                    var noCell = $('<td  class="text-center">').text(i);
                    row.append(noCell);

                    var hariCell = $('<td  class="text-center">').text(+i);
                    row.append(hariCell);

                    var zCell = $('<td  class="text-center">').text(z);
                    row.append(zCell);

                    var r = z / m;
                    var rCell = $('<td  class="text-center">').text(r.toFixed(2));
                    row.append(rCell);

                    var permintaanIndex = findIndex(cdf, r);
                    var permintaanCell = $('<td  class="text-center">').text(permintaan[permintaanIndex]);
                    row.append(permintaanCell);

                    table3Body.append(row);

                    // Menghasilkan nilai z baru menggunakan metode Kongruensial Linier
                    z = (a * z + c) % m;
                }
            }
        }

        function findIndex(arr, value) {
            for (var i = 0; i < arr.length; i++) {
                if (value <= arr[i]) {
                    return i;
                }
            }
            return arr.length - 1;
        }

        // Attach event handlers
        $('#refreshBtn').on('click', refreshPage);
        $('#runSimBtn').on('click', runSimulation);
    });
</script>

@endsection
