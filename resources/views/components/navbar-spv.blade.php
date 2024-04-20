<div>


  <nav class="navbar shadow tw-h-16">
      <div class="container tw-flex">
          <a class="navbar-brand tw-flex" href="#">
              <img class="align-middle tw-bg-white" width="40" src="{{ asset('assets/images/logo-white.png') }}"
                  alt="">
          </a>
          <div class="navbar navbar-expand-lg navbar-light bg-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
              <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                  <li class="nav-item">
                      <a href="{{ route('spv.dashboard') }}"
                          class="nav-link text-dark hover:tw-underline tw-underline-offset-[10px] tw-decoration-4 tw-decoration-[#9F70FD] active:tw-bg-[#9F70FD] {{ Request::routeIs('spv.dashboard') ? 'tw-underline ' : '' }}">
                          Dashboard
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('spv.presensi') }}"
                          class="nav-link text-dark hover:tw-underline tw-underline-offset-[10px] tw-decoration-4 tw-decoration-[#9F70FD] active:tw-bg-[#9F70FD] {{ Request::routeIs('spv.presensi', 'spv.presensi.*') ? 'tw-underline ' : '' }}">
                          Presensi
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('spv.penilaian') }}"
                          class="nav-link text-dark hover:tw-underline tw-underline-offset-[10px] tw-decoration-4 tw-decoration-[#9F70FD] active:tw-bg-[#9F70FD] {{ Request::routeIs('spv.penilaian', 'spv.penilaian.*') ? 'tw-underline ' : '' }}">
                          Penilaian 
                      </a>
                  </li>

                  {{-- laporan --}}
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark hover:tw-underline tw-underline-offset-[10px] tw-decoration-4 tw-decoration-[#9F70FD] active:tw-bg-[#9F70FD] {{ Request::routeIs('spv.laporan-presensi', 'spv.laporan-presensi.*', 'spv.laporan-penilaian', 'spv.laporan-penilaian.*', 'spv.laporan-gaji', 'spv.laporan-gaji.*') ? 'tw-underline ' : '' }}"
                        id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="vertical-align: middle ;">Laporan
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end tw-bg-white" aria-labelledby="navbarDropdown"
                        style="">
                        <li
                            class="hover:tw-border-b-4 tw-border-[#9F70FD] {{ Request::routeIs('spv.laporan-presensi', 'spv.laporan-presensi.*') ? 'tw-border-b-4' : '' }}">
                            <a class="dropdown-item  " href="{{ route('spv.laporan-presensi') }}">
                               Laporan Presensi
                            </a>
                        </li>
                        <li
                            class="hover:tw-border-b-4 tw-border-[#9F70FD] {{ Request::routeIs('spv.laporan-penilaian', 'spv.laporan-penilaian.*') ? 'tw-border-b-4' : '' }}">
                            <a class="dropdown-item  " href="{{ route('spv.laporan-penilaian') }}">
                               Laporan penilaian
                            </a>
                        </li>
                        <li
                            class="hover:tw-border-b-4 tw-border-[#9F70FD] {{ Request::routeIs('spv.laporan-gaji', 'spv.laporan-gaji.*') ? 'tw-border-b-4' : '' }}">
                            <a class="dropdown-item  " href="{{ route('spv.laporan-gaji') }}">
                               Laporan gaji 
                            </a>
                        </li>
                    </ul>
                </li>

                  {{-- profile --}}
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-dark hover:tw-underline tw-underline-offset-[10px] tw-decoration-4 tw-decoration-[#9F70FD] active:tw-bg-[#9F70FD] {{ Request::routeIs('admin.profile') ? 'tw-underline ' : '' }}"
                          id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false" style="vertical-align: middle ;">
                          Pengaturan &nbsp;<i class="bi bi-person-circle"></i>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown" style="">
                          <li>
                              <a class="dropdown-item" href="#!">
                                  <i class="bi bi-person-fill-gear"></i>&nbsp; Akun
                              </a>
                          </li>
                          <li class="p-0 m-0">
                              <hr class="p-0 m-0">
                          </li>
                          <li>
                              <a class="dropdown-item" href="{{ url('/logout') }}"
                                  onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                  <i class="bi bi-box-arrow-right"></i> &nbsp; Logout
                              </a>
                              <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                  style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
</div>

<style>
  .select {
      font-size: 100px;
  }
</style>
