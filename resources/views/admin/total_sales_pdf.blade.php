<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Total Sales</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        @font-face {
        font-family: 'Roboto';
        font-weight: normal;
        font-style: normal;
        font-variant: normal;
        src: url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        }
        body {
        font-family: 'Roboto', sans-serif;
        }
        /* @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
        } */
    </style>
</head>
<body>
    <div id="app">
        <div class="container">
            <h3 class="text-center mb-3">{{ __('Total Sales Report') }}</h3>
            <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td scope="col">Total Products</td>
                    <td>{{ number_format($product) }}</td>
                  </tr>
                  <tr>
                    <td>Total Sales</td>
                    <td style="font-family: DejaVu Sans;">&#8369;{{ number_format($total_sales) }}</td>
                  </tr>
                  <tr>
                    <td>Total Orders</td>
                    <td>{{ number_format($total_orders) }}</td>
                  </tr>
                  <tr>
                    <td>Total Stores</td>
                    <td>{{ number_format($store) }}</td>
                  </tr>
                  <tr>
                    <td>Total Users</td>
                    <td>{{ number_format($user) }}</td>
                  </tr>
                  <tr>
                    <td>Products Sold</td>
                    <td>{{ number_format($product_sold) }}</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</body>
</html>
