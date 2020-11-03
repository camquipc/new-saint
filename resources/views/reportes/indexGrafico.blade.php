@extends('layouts.app_template')



@section('content')

<div class="col-lg-12">

<div class="card">
    <div class="card-header">
    <strong class="card-title">Reportes Gráficos </strong>
    </div>

    <div class="card-body card-block">

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">

    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">

    <i class="fa fa-address-card-o"></i> Gráficos</a>

    
  </div>
</nav>


<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

    <br>
    <div class="row">

    <div class="card ">

                <div class="card-body pb-0 ">
                        
                    <a href="#" data-toggle="modal" data-target="#exampleModa30" class="btn-sm  pull-right " title="Filtar Gráficos"> 
                        <span class="fa fa-filter" aria-hidden="true">Filtar Gráfico </span> </a>

                </div>
            </div>

      @include('flash::message')

      <br><br>

    <div class="col-md-12">
        <div class="card ">
            <div class="header">
                <h4 class="title"></h4>
                <p class="category"></p>
            </div>
            <div class="content">
               {!! $chart22->html() !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">

      
        <div class="card">
            <div class="header">
                <h4 class="title"></h4>
                <p class="category"></p>
            </div>
            <div class="content">
                {!! $chart->html() !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card ">
            <div class="header">
                <h4 class="title"></h4>
                <p class="category"></p>
            </div>
            <div class="content">
                {!! $chart2->html() !!}
            </div>
        </div>
    </div>
    
<div class="col-md-12">
        <div class="card ">
            <div class="header">
                <h4 class="title"></h4>
                <p class="category"></p>
            </div>
            <div class="content" >
               <div  id="container3" style = "width: 550px; height: 400px; margin: 0 auto">
                  
               </div>
            </div>
        </div>
    </div>


    <!--<div class="col-md-6" id="chart-div">

        
    </div>-->
        
</div>

  </div>

</div>


    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    {!! $chart2->script() !!}
    {!! $chart22->script() !!}

 
<script language = "JavaScript">

         var data = <?php echo $data; ?>;

    
         $(document).ready(function() {
            var chart = {
               plotBackgroundColor: null,
               plotBorderWidth: null,
               plotShadow: false
            };
            var title = {
               text: 'Socios con mas Aporte a la Caja de Ahorro (mes)'   
            };
            var tooltip = {
               pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            };
            var plotOptions = {
               pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  
                  dataLabels: {
                     enabled: true,
                     format: '<b>{point.name}%</b>: {point.percentage:.1f} %',
                     style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor)||
                        'black'
                     }
                  }
               }
            };
            var series = [{
               type: 'pie',
               name: 'Browser share',
               data: data,
            }];
            var json = {};   
            json.chart = chart; 
            json.title = title;     
            json.tooltip = tooltip;  
            json.series = series;
            json.plotOptions = plotOptions;
            $('#container3').highcharts(json);  
         });
      </script>
   
  
@include('reportes.modal')
    
    @include('layouts.app_template_sub_footer')
  
@endsection



