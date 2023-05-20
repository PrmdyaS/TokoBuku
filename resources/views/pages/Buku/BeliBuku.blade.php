@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Beli Buku'])
    <style>
        .alert-container.hidden {
            display: none;
        }

        .alert-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .alert-box {
            width: 600px;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .alert-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .alert-message {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .alert-buttons {
            display: flex;
            justify-content: center;
        }

        .alert-button {
            padding: 8px 16px;
            margin: 0 5px;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #007bff;
            cursor: pointer;
        }

        .alert-button:hover {
            background-color: #0056b3;
        }

        .custom-number-input::-webkit-inner-spin-button,
        .custom-number-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div id="msg" class="alert alert-danger" role="alert" hidden>
            </div>
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="card-body">
                        <div class="flex flex-col" style="display: flex;">
                            <img src="{{ asset('thumbnailBuku/' . $buku->thumbnail_buku) }}" alt="Gambar Buku"
                                style="width: 350px; margin-right: 20px;">
                            <div style="display: flex; flex-direction: column; width: 100%;">
                                <div style="display: flex; justify-content: space-between;">
                                    <h1>{{ $buku->nama_buku }}</h1>
                                    <h3 style="display: flex">Stok:<div class="text-info" style="margin-left: 10px">
                                            {{ $buku->stock }}</div>
                                    </h3>
                                </div>
                                <h2 class="text-success" style="font-size: 50px;">
                                    Rp{{ number_format($buku['harga'], 0, ',', '.') }},-
                                </h2>
                                <div class="container" style="display: flex; justify-content: space-between;  width: 100%;">
                                    <div style="display: flex; flex-direction: column;">
                                        <h4>Pengarang</h4>
                                        <h6>{{ $buku->pengarang }}</h6>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <h4>Penerbit</h4>
                                        <h6>{{ $buku->penerbit }}</h6>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <h4>Tanggal Publikasi</h4>
                                        <h6>{{ $buku->tanggal_publikasi }}</h6>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <h4>Jumlah Halaman</h4>
                                        <h6>{{ $buku->jumlah_halaman }} Halaman</h6>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <h4>Genre Buku</h4>
                                        <h6>{{ $buku->callGenreBuku['nama_genre_buku'] }}</h6>
                                    </div>
                                </div>
                                <div
                                    style="width: 100%; height: 100%; display: flex; align-items: end; justify-content: end;">
                                    <div style="display:flex; flex-direction: column; align-items: center;">
                                        <h5>Jumlah</h5>
                                        <div style="display: flex; margin-bottom: 20px;">
                                            <button style="width: 50px; border: 2px solid rgb(221, 220, 220);"
                                                id="btnmin">-</button>
                                            <form id="formJumlah"
                                                action="{{ url('/process-beli-buku-' . $buku['id_buku']) }}">
                                                <input name="jumlah"
                                                    style="width: 60px; text-align: center; border: 2px solid rgb(221, 220, 220);"
                                                    type="number" class="custom-number-input" value="1"
                                                    id="jumlah_input" min="1">
                                            </form>
                                            <button style="width: 50px; border: 2px solid rgb(221, 220, 220);"
                                                id="btnplus">+</button>
                                        </div>
                                        <a id="beliBuku"
                                            style="margin: 0px 0px 0px 0px; font-size: 20px; display: flex; align-items: center; justify-content: center;"
                                            class="btn btn-sm btn-info" title="Add Data"><i class="ni ni-cart"
                                                style="transform: scale(1.5); margin-right:10px;"></i> Beli Buku</a>
                                    </div>
                                </div>
                            </div>
                            <div class="alert-container hidden">
                                <div class="alert-container">
                                    <div class="alert-box">
                                        <div class="flex flex-col" style="display: flex;">
                                            <img src="{{ asset('thumbnailBuku/' . $buku->thumbnail_buku) }}"
                                                alt="Gambar Buku" style="width: 200px; margin-right: 20px;">
                                            <div style="display: flex; flex-direction: column; width: 100%;">
                                                <div
                                                    style="display: flex; align-items: start; flex-direction: column; justify-content: space-between; text-align: left;">
                                                    <h6>Nama Buku : {{ $buku->nama_buku }}</h6>
                                                    <h6 style="margin-top: -10px">Harga Buku :
                                                        Rp{{ number_format($buku['harga'], 0, ',', '.') }},-
                                                        <h6 id="jumlah_buku" style="margin-top: -10px">Jumlah Buku :
                                                            <h6 id="total_harga" style="margin-top: -10px">Total Harga Buku
                                                                :
                                                            </h6>
                                                            <div class="alert-buttons" style="width: 100%;">
                                                                <button id="batal"
                                                                    class="btn bg-gradient-danger my-4 mb-2"
                                                                    style="width: 100px; margin-right: 10px;">Batal</button>
                                                                <button id="beli"
                                                                    class="btn bg-gradient-success my-4 mb-2"
                                                                    style="width: 100px; margin-left: 10px;">Beli</button>
                                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const numberInput = document.getElementById('jumlah_input');
        const btnMin = document.getElementById('btnmin');
        const btnPlus = document.getElementById('btnplus');
        const jumlah_buku = document.getElementById('jumlah_buku')
        const total_harga = document.getElementById('total_harga')

        btnMin.addEventListener('click', function() {
            numberInput.value--;
        });

        btnPlus.addEventListener('click', function() {
            numberInput.value++;
        });

        numberInput.addEventListener('change', function() {
            const inputValue = parseInt(numberInput.value);

            if (inputValue <= 0) {
                numberInput.value = 1;
            }
        });

        const btnBeliBuku = document.getElementById('beliBuku');
        const alertContainer = document.querySelector('.alert-container');
        const btnBatal = document.getElementById('batal');
        const btnBeli = document.getElementById('beli');
        const formJumlah = document.getElementById('formJumlah');
        const msg = document.getElementById('msg');

        btnBeli.addEventListener('click', function() {
            formJumlah.submit();
        });

        btnBatal.addEventListener('click', function() {
            alertContainer.classList.add('hidden');
        });

        btnBeliBuku.addEventListener('click', function() {
            if ({{ $buku->stock }} >= numberInput.value) {
                alertContainer.classList.remove('hidden');
                jumlah_buku.innerHTML = 'Jumlah Buku : ' + numberInput.value;
                total_harga.innerHTML = 'Total Harga Buku : Rp' + (numberInput.value * {{ $buku['harga'] }})
                    .toLocaleString('id-ID') + ',-';
            } else {
                msg.removeAttribute('hidden');
                msg.innerHTML = "Stock Buku Tidak Cukup";

            }
        });
    </script>
@endsection
