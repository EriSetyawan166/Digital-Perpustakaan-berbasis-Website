<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Digital Perpustakaan
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ asset('css/material-dashboard.css') }}">
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Digital Perpustakaan
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.buku.index') }}">
              <i class="material-icons">book</i>
              <p>Buku</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kategori.index') }}">
              <i class="material-icons">category</i>
              <p>Kategori</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                        Account
                    </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>

            <!-- Logout Modal -->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to logout?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Data Buku</h4>
                  <p class="card-category">List Buku yang Terdaftar</p>
                </div>
                <div class="card-body table-responsive">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambahBuku">Tambah Buku</button>
                                <!-- Modal Tambah Buku -->
                <div class="modal fade" id="modalTambahBuku" tabindex="-1" role="dialog" aria-labelledby="modalTambahBukuLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahBukuLabel">Tambah Buku</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <!-- Form tambah buku -->
                            <form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control text-dark" id="judul" name="judul" placeholder="Masukkan Judul">
                                </div>
                                <div class="form-group">
                                    <select class="form-control text-dark" id="kategori" name="kategori">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control text-dark" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control text-dark" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah">
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file custom-file-input" id="file_buku" name="file_buku" accept=".pdf" onchange="updatePdfLabel()">
                                        <label class="custom-file-label text-dark" for="file_buku">Upload PDF</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file custom-file-input" id="cover_buku" name="cover_buku" accept=".jpeg,.jpg,.png" onchange="updateCoverLabel()">
                                        <label class="custom-file-label text-dark" for="cover_buku">Upload Cover</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>

                        </div>
                    </div>
                </div>
                <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Kategori</th>
                          <th>Deskripsi</th>
                          <th>Jumlah</th>
                          <th>Uploader</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($buku as $item)
                      <tr>
                          <td>{{($buku->currentPage() - 1) * $buku->perPage() + $loop->iteration}}</td>
                          <td>{{ $item->judul }}</td>
                          <td>{{ $item->category->nama }}</td>
                          <td>{{ $item->deskripsi }}</td>
                          <td>{{ $item->jumlah }}</td>
                          <td>{{ $item->user->nama }}</td>
                          <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBuku{{ $item->id }}">Detail</button>
                          </td>
                      </tr>
                      @endforeach

                      <!-- Modal -->
                      @foreach($buku as $item)
                      <div class="modal fade" id="modalBuku{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalBuku{{ $item->id }}Label" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="row">
                                          <div class="col-md-4">
                                              <div class="image-container">
                                                  <img class="card-img-top img-fluid" src="{{ asset('uploads/cover/' . $item->cover_image_path) }}" alt="{{ $item->judul }}">
                                              </div>
                                          </div>
                                          <div class="col-md-8">
                                              <h5 class="modal-title font-weight-bold">{{ $item->judul }}</h5>
                                              <p>{{ $item->deskripsi }}</p>
                                              <p>Jumlah: {{ $item->jumlah }}</p>
                                              <p>Uploader: {{ $item->user->nama }}</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <a href="{{ asset('uploads/buku/' . $item->file_path) }}" target="_blank" class="btn btn-primary">View PDF</a>
                                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{ $item->id }}">
                                          Edit
                                      </button>
                                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{ $item->id }}">
                                          Hapus
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach
                      @foreach($buku as $item)
                     <!-- Modal Edit Buku -->
                      <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEdit{{ $item->id }}Label" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="modalEdit{{ $item->id }}Label">Edit Buku</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <!-- Form Edit Buku -->
                                      <form action="{{ route('admin.buku.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-group">
                                              <input type="text" class="form-control text-dark" id="edit-judul" name="judul" value="{{ $item->judul }}" required>
                                          </div>
                                          <div class="form-group">
                                              <select class="form-control text-dark" id="edit-kategori" name="kategori" required>
                                                  @foreach($kategori as $k)
                                                      <option value="{{ $k->id }}" {{ $item->kategori_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <textarea class="form-control text-dark" id="edit-deskripsi" name="deskripsi" rows="3" required>{{ $item->deskripsi }}</textarea>
                                          </div>
                                          <div class="form-group">
                                              <input type="number" class="form-control text-dark" id="edit-jumlah" name="jumlah" value="{{ $item->jumlah }}" required>
                                          </div>
                                          <div class="form-group">
                                              <div class="custom-file"> 
                                                <label for="edit-file_buku" class="custom-file-label text-dark mb-5">{{$item->file_path}}</label>
                                                <input type="file" class="form-control-file" id="edit-file_buku" name="file_buku" accept=".pdf" onchange="updatePdfLabelEdit()">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="custom-file"> 
                                                <label for="edit-cover_buku" class="custom-file-label text-dark">{{$item->cover_image_path}}</label>
                                                <input type="file" class="form-control-file" id="edit-cover_buku" name="cover_buku" accept=".jpeg,.jpg,.png" onchange="updateCoverLabelEdit()">
                                                </div>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>

                      @endforeach
                      @foreach($buku as $item)
                      <!-- Modal Konfirmasi Hapus -->
                      <div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapus{{ $item->id }}Label" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="modalHapus{{ $item->id }}Label">Konfirmasi Hapus</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <p>Apakah Anda yakin ingin menghapus buku ini?</p>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                      <form action="{{ route('admin.buku.destroy', $item->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">Hapus</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach

                  </tbody>
                </table>
                </div>
              </div>
              <div class="card-footer">

              {{$buku->links("pagination::bootstrap-5")->withClass('custom-pagination')}}

            </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right" id="date">
            Muhammad Eri Setyawan
          </div>
        </div>
      </footer>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-dashboard.js') }}"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>

<script>
    function updatePdfLabel() {
        var pdfInput = document.getElementById('file_buku');
        var pdfLabel = pdfInput.nextElementSibling;
        var fileName = pdfInput.files[0].name;
        pdfLabel.innerHTML = fileName;
    }

    function updateCoverLabel() {
        var coverInput = document.getElementById('cover_buku');
        var coverLabel = coverInput.nextElementSibling;
        var fileName = coverInput.files[0].name;
        coverLabel.innerHTML = fileName;
    }
</script>

<script>
    function updatePdfLabelEdit() {
        var pdfInput = document.getElementById('edit-file_buku');
        var pdfLabel = pdfInput.previousElementSibling;
        var fileName = pdfInput.files[0].name;
        pdfLabel.innerHTML = fileName;
    }

    function updateCoverLabelEdit() {
        var coverInput = document.getElementById('edit-cover_buku');
        var coverLabel = coverInput.previousElementSibling;
        var fileName = coverInput.files[0].name;
        coverLabel.innerHTML = fileName;
    }
</script>


</body>
@include('sweetalert::alert')
</html>