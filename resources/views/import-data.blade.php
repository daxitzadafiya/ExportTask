<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import CSV</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        @if (Session::has('success') || Session::has('error'))
            <div class="alert {{ Session::has('success') ? 'alert-success' : 'alert-danger' }} " role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Import Data
            </div>
            <div class="card-body">
                <h5 class="card-title">User can import the data from the local CSV file</h5>
                <div class="d-flex">
                    <form id="uploadCsv" class="mr-2" name="uploadCategoryForm"
                        action="{{ route('import_categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary">Handle Categories</button>
                            </div>
                        </div>
                    </form>
                    <form id="uploadCsv" name="uploadProductsForm" action="{{ route('import_products.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <button class="btn btn-primary">Handle Products</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
