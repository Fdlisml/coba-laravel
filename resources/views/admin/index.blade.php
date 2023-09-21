<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ url('css/admin/style.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="{{ url('/admin/index') }}">
                        <div class="logo-flex">
                            <span class="icon">
                                <div class="logo-bg">
                                    <img
                                        src="{{ url('image/building-logo-icon-design-template-vector_67715-555-transformed-removebg-preview.png') }}">
                                </div>
                            </span>
                            <span class="title">WorkAssigner</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/index') }}">
                        <span class="icon">
                            <ion-icon name="document-text-outline"></ion-icon>
                        </span>
                        <span class="title">Project</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/user') }}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">User</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/laporan') }}">
                        <span class="icon">
                            <ion-icon name="folder-open-outline"></ion-icon>
                        </span>
                        <span class="title">Report</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/admin/tugas') }}">
                        <span class="icon">
                            <ion-icon name="reader-outline"></ion-icon>
                        </span>
                        <span class="title">Work</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/logout') }}">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="secMain">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>

                    <div class="search">
                        <form action="{{ url('/admin/project/search') }}" method="GET">
                            <input type="text" name="keyword" placeholder="Cari proyek...">
                            <ion-icon name="search-outline"></ion-icon>
                        </form>
                    </div>

                    <div class="toggleWrapper">
                        <input type="checkbox" class="dn" id="dn">
                        <label for="dn" class="toggleBtn">
                            <span class="toggle__handler">
                                <span class="crater crater--1"></span>
                                <span class="crater crater--2"></span>
                                <span class="crater crater--3"></span>
                            </span>
                            <div class="star-c">
                                <span class="star star--1"></span>
                                <span class="star star--2"></span>
                                <span class="star star--3"></span>
                                <span class="star star--4"></span>
                                <span class="star star--5"></span>
                                <span class="star star--6"></span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- ================ Order Details List ================= -->
                <div class="details">
                    <!-- ================= New Customers ================ -->
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Data Project</h2>
                            <a id="myBtn" class="btn">Form Project</a>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <th>NAMA PROJECT</th>
                                    <th>DESKRIPSI</th>
                                    <th>PRIORITAS</th>
                                    <th>TANGGAL MULAI</th>
                                    <th>TANGGAL SELESAI</th>
                                    <th>ACTION</th>
                                </tr>
                                @foreach ($project as $p)
                                    <div class="wadah-table">
                                        <tr>
                                            <td>{{ $p['nama_project'] }}</td>
                                            <td>{{ $p['deskripsi'] }}</td>
                                            <td>{{ $p['prioritas'] }}</td>
                                            <td>{{ $p['tgl_mulai'] }}</td>
                                            <td>{{ $p['tgl_selesai'] }}</td>
                                            <td>
                                                <div class="flex-btn">
                                                    <a href="{{ url('admin/project/destroy/' . $p['id']) }}">HAPUS</a>
                                                    |
                                                    <a href="{{ url('admin/project/edit/' . $p['id']) }}">Edit</a>
                                                    |
                                                    <a href="{{ url('admin/tugas/create/' . $p['id']) }}">Tambah
                                                        Tugas</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>

                <!-- The Modal -->
                <div id="myModal" class="modal" @if(Request::is('admin/user/edit/*')) style='display: block' @endif>

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="recentOrders">
                            <div class="cardHeader">
                                <span class="close">&times;</span>
                                <h2>Form Project</h2>
                            </div>

                            @if (Request::is('admin/project/edit/*'))
                                @php
                                    $data = [
                                        'url' => 'admin/project/update/' . $projectEdit['id'],
                                        'nama_project' => $projectEdit['nama_project'],
                                        'deskripsi' => $projectEdit['deskripsi'],
                                        'prioritas' => $projectEdit['prioritas'],
                                        'tgl_mulai' => $projectEdit['tgl_mulai'],
                                        'tgl_selesai' => $projectEdit['tgl_selesai'],
                                    ];
                                @endphp
                            @else
                                @php
                                    $data = [
                                        'url' => 'admin/project/store',
                                        'nama_project' => '',
                                        'deskripsi' => '',
                                        'prioritas' => '',
                                        'tgl_mulai' => '',
                                        'tgl_selesai' => '',
                                    ];
                                @endphp
                            @endif
                            <div class="form">
                                <form action="{{ url($data['url']) }}" method="post">
                                    @csrf
                                    <label>
                                        Nama Project
                                    </label>
                                    <input type="text" name="nama_project" value="{{ $data['nama_project'] }}">

                                    <label>
                                        Deskripsi
                                    </label>
                                    <textarea name="deskripsi" id="" cols="10" rows="10">{{ $data['deskripsi'] }}</textarea>

                                    <label>
                                        Prioritas
                                    </label>
                                    <input type="number" name="prioritas" max="10" min="1"
                                        value="{{ $data['prioritas'] }}">

                                    <label><br>
                                        Tanggal Mulai
                                    </label>
                                    <input type="date" name="tgl_mulai" value="{{ $data['tgl_mulai'] }}">

                                    <label>
                                        Tanggal Selesai
                                    </label>
                                    <input type="date" name="tgl_selesai" value="{{ $data['tgl_selesai'] }}">

                                    <button type="submit" class="cta">
                                        <span>Send Work !</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-loader">
            <div class="loader" id="loader">
                <div class="dot dot-1"></div>
                <div class="dot dot-2"></div>
                <div class="dot dot-3"></div>
                <div class="dot dot-4"></div>
                <div class="dot dot-5"></div>
            </div>
        </div>

        @if (session('error'))
            <script>
                alert("{{ session('error') }}")
            </script>
        @elseif (session('success'))
            <script>
                alert("{{ session('success') }}")
            </script>
        @endif

        <!-- =========== Scripts =========  -->
        <script src="{{ url('js/script.js') }}"></script>

        <!-- ====== ionicons ======= -->
        <script type="module" src="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
