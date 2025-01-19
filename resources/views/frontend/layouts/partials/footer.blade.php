<footer id="footer" class="footer dark-background">

  <div class="container">
    <div class="row gy-3">
      <div class="col-lg-4 col-md-6 d-flex">
        <i class="bi bi-geo-alt icon"></i>
        <div class="address">
          <h4>Address</h4>
          <pre>{{ $footer->alamat }}</pre>
        </div>

      </div>

      <div class="col-lg-3 col-md-6 d-flex">
        <i class="bi bi-telephone icon"></i>
        <div>
          <h4>Contact</h4>
          <p>
            <strong>Phone:</strong> <span>{{ $footer->no_hp }}</span><br>
            <strong>Email:</strong> <span>{{ $footer->email }}</span><br>
          </p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 d-flex">
        <div>
          <img src="{{ asset('assets/img/logos/Logo_SAJI.png') }}" alt="">
        </div>
      </div>

    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">Saji.co.id</strong> <span>All Rights Reserved</span></p>
    <div class="credits">
      Designed by <a href="https://andaka.cloud">Jdeva Production</a>
    </div>
  </div>

</footer>