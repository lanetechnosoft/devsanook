<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <title>ລາຍງານການແຜ່ລະບາດ Covid-19</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Noto+Serif:400,700');
        @import url(//fonts.googleapis.com/earlyaccess/notosanslao.css);
        @import url(//fonts.googleapis.com/earlyaccess/notoseriflao.css);
        /*
        h1 { font-family: sans-serif; margin: 0; }
        h1.noto { font-family: 'Noto Serif', sans-serif; font-weight: 400; }
        h1.bold { font-weight: 700; }
        h1.lao { font-family: 'Noto Serif Lao'; font-weight: 400; }
        h1.lao-bold { font-family: 'Noto Serif Lao'; font-weight: 700; }
        h1.sans-lao { font-family: 'Noto Sans Lao'; font-weight: 400; }
        h1.sans-lao-bold { font-family: 'Noto Sans Lao'; font-weight: 700; }
        */
        body,h1,p {
        font-family: 'Noto Serif Lao'; font-weight: 700;
        }
        
</style>
  </head>
  <body>
     <div class="container container-fluid">
         
    <h1 class="text-secondary text-center">ລາຍງານການແຜ່ລະບາດ Covid-19</h1>
    <hr>
    <div class="row">
  <div class="col-sm-4">
    <div class="card text-white bg-warning  mb-3">
      <div class="card-body">
        <h2 class="card-title"><i class="fa fa-snowflake-o fa-lg"></i> ຈຳນວນຜູ້ຕິດເຊື້ອ</h2>
        <h4 class="card-text text-right" id="confirmed"></h4>
        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card text-white bg-danger mb-3">
      <div class="card-body">
        <h2 class="card-title"><i class="fa fa-user-circle-o fa-lg"></i> ຈຳນວນຜູ້ເສຍຊີວິດ</h2>
        <h4 class="card-text text-right" id="deaths"></h4>
        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card text-white bg-success mb-3">
      <div class="card-body">
        <h2 class="card-title"><i class="fa fa-refresh fa-lg"></i> ຈຳນວນຜູ້ຫາຍດີ</h2>
        <h4 class="card-text text-right" id="recovered"></h4>
        <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-sm-12">
    <table class="table table-hover"  id="demo">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ລະຫັດປະເທດ</th>
      <th scope="col">ຊື່ປະເທດ</th>
      <th scope="col">ຂໍ້ມູນວັນທີ</th>
      <th scope="col">ຕິດເຊື້ອ</th>
      <th scope="col">ເສຍຊີວິດ</th>
      <th scope="col">ປິ່ນປົວຫາຍດີ</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
 </table>
 </div>
 </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <script>
    $(document).ready(function(){
    //$("button").click(function(){
    $.get("https://coronavirus-tracker-api.herokuapp.com/v2/locations?source=jhu&timelines=false", function(data, status){
        
        if(status='success'){
          //console.log('result=> '+ JSON.stringify(data['latest']));
          $('#confirmed').html(data['latest']['confirmed']+"  ຄົນ")
          $('#deaths').html(data['latest']['deaths']+"  ຄົນ");
          $('#recovered').html(data['latest']['recovered'].toLocaleString('en-IN')+"  ຄົນ");
          //console.log('Total=> '+data['locations']['country_code']);
          var locations = data['locations']; 
           $.each(locations, function(i, item){
               //console.log(locations[i]);
               //console.log(item['country_code']);
               $('#demo tbody').append(
                        '<tr><td>' + item['country_code']  +
                        '</td><td>' + item['country'] +
                        '</td><td>' + item['last_updated'] +
                        '</td><td class="text-warning">' + item['latest']['confirmed'] +
                        '</td><td class="text-danger">' + item['latest']['deaths'] + 
                        '</td><td class="text-success">' + item['latest']['recovered'] + 
                        '</td></tr>'
                    )
           }); // loop
        }
       
        /*
        var content = '';
        $.each(data, function(i, item){
            console.log(item);
            if(i='latest'){
            content = content + "Location : " + item.confirmed +  ', Lat = ' + item.deaths + ', Lng = ' + item.recovered + ' <br>';
            }else{
                content = content + "Location : " + item[i]+  ', Lat = ' + item.country_code + ', Lng = ' + item.latest + ' <br>';
            }
        }); // loop
        */
        //$('#demo').html(content);
        //document.getElementById("demo").innerHTML = res;
      //alert("Data: " + data + "\nStatus: " + status);
    //});
  });
});
</script>
  </body>
</html>