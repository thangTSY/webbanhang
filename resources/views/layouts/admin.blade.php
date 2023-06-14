

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css\style.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    
    <title>Document</title>
</head>
<body>
    <div class="containe">
        @include('warehouse.siderbar')
        <div class="wrapper">
            @include('warehouse.header')

            @yield('content')
                
        
            
        </div>
    </div>  
</body>
</html>