<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function()
        {
            var dtToday = new Date();
            var month = dtToday.getMonth()+1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
            {
                month = '0'+month.toString();

            }
            if(day < 10)
            {
                day = '0'+day.toString();

            }

            var maxDate = year + '-' + month +'-' + day;
            $("#calender").attr('min',maxDate);



        });
    </script>
</head>
<body>
    <input type="date" id="calender"> 
</body>
</html>