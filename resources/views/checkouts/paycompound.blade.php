<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/modules/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-light">
        <div class="container d-block">
            <div class="row mx-auto">
              <div class="col-12 col-md-6 offset-md-3">
                <a href="{{ route('student.viewCompound') }}"><i class="bi bi-chevron-left"></i></a>
                <a class="navbar-brand ms-4" href="{{ route('home') }}">
                    <img src="{{ asset('img/logos.png') }}">
                </a>
              </div>
            </div>
        </div>
    </nav>


    <div class="container">
      <div class="row mx-auto">
        <div class="col-12 col-md-6 offset-md-3">
          <div class="card mt-5">
              <div class="card-header text-center">
                  <h4 class="card-title">Compound Payment Page</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('checkout.createSession') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                          <label>Compound</label>
                      </div>
                      <div class="col-md-6 form-group">
                          <input type="text" id="compound" class="form-control" name="compound" value="{{ $compound->comp_reason }}" readonly>
                      </div>
                      <div class="col-md-6">
                          <label>Need To Pay (RM)</label>
                      </div>
                      <div class="col-md-6 form-group">
                          <input type="number" id="price" class="form-control" name="price" value="{{ number_format((float)$compound->comp_value, 2, '.', '') }}" readonly>
                      </div>
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">Pay Now</button>
                    </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>


</body>
</html>