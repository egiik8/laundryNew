<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
  
      <div class="sidebar-brand d-none d-md-flex">
  <img src="{{asset('assets/brand/cuci.svg')}}" alt="Alisha Laundry Logo" width="50" height="50">
  <span style="font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 400; font-style: italic; color: #fff; margin-left: 10px;">Alisha Laundry</span>
</div>
      <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">
            <svg class="nav-icon">
              <use xlink:href="{{asset('assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
            </svg> Dashboard</a>
          </li>


          <li class="nav-item"><a class="nav-link" href="{{route('pelanggan.index')}}">
            <svg class="nav-icon">
              <use xlink:href="{{asset('assets/vendors/@coreui/icons/svg/free.svg#cil-group')}}"></use>
            </svg>Data Pelanggan</a>
          </li>

          <li class="nav-item"><a class="nav-link" href="{{ route('paket.index') }}">
            <svg class="nav-icon">
            <use xlink:href="{{asset('assets/vendors/@coreui/icons/svg/free.svg#cil-object-group')}}"></use>
            </svg>Data Paket</a>
          </li>

          <li class="nav-item"><a class="nav-link" href="{{ route('pesanan.index')}}">
            <svg class="nav-icon">
              <use xlink:href="{{asset('assets/vendors/@coreui/icons/svg/free.svg#cil-dollar')}}"></use>
            </svg>Transaksi</a>
          </li>


          <li class="nav-item"><a class="nav-link" href="{{ route('laporan.index')}}">
            <svg class="nav-icon">
              <use xlink:href="{{asset('assets/vendors/@coreui/icons/svg/free.svg#cil-newspaper')}}"></use>
            </svg>Laporan</a>
          </li>

          <li class="nav-item">
         <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
            </svg>
            Logout
        </button>
    </form>
</li>

        
      
      </ul>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>