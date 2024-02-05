<div class="main-sidebar sidebar-style-2">
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        E-SUWAI-SETDA
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        KPR
    </div>
    <ul class="sidebar-menu">
        
        <li class="{{set_active(['admin.index'])}}"><a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>

        <li class="menu-header">Menu</li>
        <li class="{{set_active(['data-pengguna.index','data-pengguna.add'])}}"><a class="nav-link" href="{{route('data-pengguna.index')}}">
            <i class="fas fa-users"></i> <span>Pengguna</span></a>
        </li>
        <li class="{{set_active(['admin-pegawai.index','admin-pegawai.create'])}}"><a class="nav-link" href="{{route('admin-pegawai.index')}}">
            <i class="fas fa-address-card"></i> <span>Pegawai</span></a>
        </li>
        

        <li class="menu-header">Master Data</li>
            <li class="dropdown {{set_active([
                'data-golongan.index','data-golongan.create','data-golongan.edit',
                'data-jabatan.index','data-jabatan.create','data-jabatan.edit',
                'data-unit_kerja.index','data-unit_kerja.create','data-unit_kerja.edit',
                'data-level_surat.index','data-level_surat.create','data-level_surat.edit'
            ])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-table"></i> <span>Master Data</span></a>
            <ul class="dropdown-menu">
                <li class="{{ set_active(['data-golongan.index','data-golongan.create','data-golongan.edit']) }}">
                    <a class="nav-link" href="{{ route('data-golongan.index') }}">
                        Golongan
                    </a></li>
                <li class="{{ set_active(['data-jabatan.index','data-jabatan.create','data-jabatan.edit']) }}">
                    <a class="nav-link" href="{{ route('data-jabatan.index') }}">
                        Jabatan
                    </a>
                </li>
                <li class="{{ set_active(['data-unit_kerja.index','data-unit_kerja.create','data-unit_kerja.edit']) }}">
                    <a class="nav-link" href="{{route('data-unit_kerja.index')}}">
                        Unit Kerja
                    </a>
                </li>       
                <li class="{{ set_active(['data-level_surat.index','data-level_surat.create','data-level_surat.edit']) }}">
                    <a class="nav-link" href="{{route('data-level_surat.index')}}">
                        Level Surat
                    </a>
                </li>   
            </ul>
    </ul>
</aside>
</div>