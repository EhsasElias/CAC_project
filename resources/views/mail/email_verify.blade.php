<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">


        <style>
            body
            {
                background-color:#131313;
            }
.container
{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    text-align: center;
    font-family: tajawal;
   
    
    color: rgb(247, 247, 247);
   
}
em
{
    color:#E39100;
}
.bg-yellow
{
    background-color:#E39100;
    color: #fff;
    margin: 1rem;
    padding:0.6rem;
}

        </style>
    <title>Document</title>
</head>
<body>

    <div class="container"><img src="assets/images/email.png" width ="300" height=""alt="">
    <h1>اهلا {{$data['name']}}    CAC</h1>
    <h1>مرحبا بك في موقع
         <em>كاك</em>
          مزاد</h1>
    <p >CAC هو موقع للمزايدة على سيارات نتمنى ان نقد لكم الخدمة المطلوبه </p>
    <p > نحن نرسل لك هذا الايميل لتفعيل حسابك لتستفيد من خدمات الموقع</p>
    <p>لتفعيل حسابك يرجى الضغط على الزر في الاسفل</p>
    <em >ملاحضة :</em>هذة الرسالة من البريد الالكتروني تم ارسالها تلقائيا من فضلك عدم الرد
{{$data['activation_url']}}
    <a href="" class="btn btn-sm bg-yellow">تفعيل الحساب</a>
</div>
</body>
</html>