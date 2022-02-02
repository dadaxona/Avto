@extends('publis.dashbord')
@section('title','Statistika Malumotlar')
@section('control')  
<div class="container-fluid">
    <div class="row mt-4">     
        <div class="container-lg">
            <div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-primary">
                  <div class="card-body">
                    <div>
                        <h3>Guruhlar</h3>
                   </div>
                    <div class="dropdown">
                      <h1>{{$static->group}}</h1>
                    </div>
                  </div>
                  <div class="c-chart-wrapper mt-3 mx-3 abcd" style="height:70px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                      <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                      <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                  <div class="chartjs-tooltip" style="opacity: 0; left: 239.333px; top: 130.059px;"><table style="margin: 0px;"><thead class="chartjs-tooltip-header"><tr class="chartjs-tooltip-header-item" style="border-width: 0px;"><th style="border-width: 0px;">June</th></tr></thead><tbody class="chartjs-tooltip-body"><tr class="chartjs-tooltip-body-item"><td style="border-width: 0px;"><span style="background: rgb(50, 31, 219); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My First dataset: 55</td></tr></tbody></table></div></div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-info">
                  <div class="card-body">
                    <div>
                      
                        <h3>O`quvchilar soni</h3>
                     
                    </div>
                    <div class="dropdown">
                      <h1>{{$static->pulis}}</h1>
                    </div>
                  </div>
                  <div class="c-chart-wrapper mt-3 mx-3 abcd" style="height:70px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                      <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-success">
                  <div class="card-body">
                    <div>
                     <h3> Yillik tushum</h3>

                    </div>
                    <div class="dropdown">
                      <h1>{{$static->summa}} <small>so`m</small></h1>
                    </div>
                  </div>
                  <div class="c-chart-wrapper mt-3 mx-3 abcd" style="height:70px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-currency-exchange" viewBox="0 0 16 16">
                      <path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z"/>
                    </svg>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-primary">
                  <div class="card-body">
                    <div>
                      <h3>To`lovlar</h3>                      
                    </div>
                    <div class="dropdown">
                      <h1>{{$static->summa2}} <small>so`m</small></h1>
                    </div>
                  </div>
                  <div class="c-chart-wrapper mt-3 mx-3 abcd" style="height:70px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                      <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                    </svg>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-6">
                <div class="card mb-4 text-white bg-danger">
                  <div class="card-body">
                    <div>
                        <h3>To`lov qilinmagan summa</h3>
                    </div>
                    <div class="dropdown">
                      <h1>{{$static->qarz}} <small>so`m</small></h1>
                    </div>
                  </div>
                  <div class="c-chart-wrapper mt-3 mx-3 abcde" style="height:70px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                      <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                      <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                      <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
     
                    
    </div>
    <form action="{{ route('new.state') }}" method="GET">
        <input type="hidden" name="group" value="0">
        <input type="hidden" name="pulis" value="0">
        <input type="hidden" name="summa" value="0">
        <input type="hidden" name="summa2" value="0">
        <input type="hidden" name="qarz" value="0">
        <div class="">
            <button class="btn btn-primary me-md-2" type="submit">
              Yillik Statistikani Yangilash
            </button>
          </div> 
       
    </form>  
</div>
@endsection