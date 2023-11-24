<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="/">SI Inventaris</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">SI</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="/"><i class="fa fa-fire"></i>
                <span>Dashboard</span></a>
        </li>

        @if (auth()->user()->role->role == 'admin')
            <li class="menu-header">Data Master</li>
            <li><a class="nav-link" href="/barang"><i class="fa fa-solid fa-cubes-stacked"></i>
                    <span>Barang</span></a>
            </li>
            <li><a class="nav-link" href="/kategori"><i class="fa fa-solid fa-list"></i>
                    <span>Kategori</span></a>
            </li>
            <li><a class="nav-link" href="/merk"><i class="fa fa-regular fa-copyright"></i>
                    <span>Merek</span></a>
            </li>
            <li><a class="nav-link" href="/lokasi"><i class="fa fa-solid fa-school"></i>
                    <span>Lokasi</span></a>
            </li>

            <li class="menu-header">Pelaporan</li>
            <li><a class="nav-link" href="/pelaporan-masuk"><i class="fa fa-solid fa-file-arrow-down"></i>
                    <span>Pelaporan masuk</span></a>
            </li>
            <li><a class="nav-link" href="/pelaporan-selesai"><i class="fa fa-sharp fa-file-circle-check"></i>
                    <span>Pelaporan Selesai</span></a>
            </li>

            <li class="menu-header">Laporan</li>
            <li><a class="nav-link" href="/laporan-inventaris"><i class="fa fa-solid fa-print"></i>
                    <span>Laporan Aset</span></a>
            </li>
            <li><a class="nav-link" href="/laporan-perbaikan"><i class="fa fa-regular fa-file-pdf"></i>
                    <span>Laporan Perbaikan</span></a>
            </li>
        @else
            <li class="menu-header">Data Master</li>
            <li><a class="nav-link" href="/barang"><i class="fa fa-solid fa-cubes-stacked"></i>
                    <span>Barang</span></a>
            </li>
            <li><a class="nav-link" href="/kategori"><i class="fa fa-solid fa-list"></i>
                    <span>Kategori</span></a>
            </li>
            <li><a class="nav-link" href="/merk"><i class="fa fa-regular fa-copyright"></i>
                    <span>Merek</span></a>
            </li>
            <li><a class="nav-link" href="/lokasi"><i class="fa fa-solid fa-school"></i>
                    <span>Lokasi</span></a>
            </li>

            <li class="menu-header">Pelaporan</li>
            <li><a class="nav-link" href="/tambah-pelaporan"><i class="fa fa-solid fa-file-arrow-down"></i>
                    <span>Tambah Pelaporan</span></a>
            </li>
            <li><a class="nav-link" href="/cek-pelaporan"><i class="fa fa-solid fa-file-circle-question"></i>
                    <span>Cek Pelaporan</span></a>
            </li>
        @endif
    </ul>
</aside>
