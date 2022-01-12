

 <main> 
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Balance</p>
                  <h5 class="font-weight-bolder mb-0">
                    Rp.{{$total_balance}}
                    <span class="text-success text-sm font-weight-bolder"></span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Order</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{$today_order}}
                    <span class="text-success text-sm font-weight-bolder"></span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-xl-4 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Monthly Income</p>
                  <h5 class="font-weight-bolder mb-0">
                    Rp.{{$income}}
                    <span class="text-success text-sm font-weight-bolder"></span>
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-5 mb-lg-0 mb-4" style="display:none;">
          <div class="card">
              <div class="card-body p-3">
                  <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                      <div class="chart">
                          <canvas id="chart-bars" class="chart-canvas" height="170px"></canvas>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-7">
          <div class="card">
              <div class="card-header pb-0">
                  <h6>Order Graph</h6>
                  <p class="text-sm">
                      <i class="fa fa-arrow-up text-success"></i>
                      <span class="font-weight-bold"> </span>@php echo date('d F Y'); @endphp          
                  </p>
              </div>
              <div class="card-body p-3">
                  <div class="chart">
                      <canvas id="chart-line" class="chart-canvas" height="300px"></canvas>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <div class="row my-4">
      <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h6>Active Order</h6>
                <p class="text-sm mb-0">
                  <i class="fa fa-check text-info" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">
                    @php
                      echo $getall->count() > 0 ? $getall->count() : '0'
                    @endphp 
                  order</span> this month
                </p>
              </div>
              <div class="col-lg-6 col-5 my-auto text-end">
                <div class="dropdown float-lg-end pe-4">
                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-secondary"></i>
                  </a>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width:5%;white-space: none!important">#</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order ID</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Order Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created By</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($activeorder->count() == 0)
                    <tr>   
                        <td class="text-center" colspan="6">
                            There's no data order for today
                        </td>
                    </tr>
                  @else
                    @php
                    $no = (($activeorder->currentPage() * 10) - 10)+1 ;
                        // $no = 1 ;
                    @endphp
                    @foreach ($activeorder as $order)
                        
                        <tr class="text-center">
                            <td scope="row">{{ $no }}</td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>Rp. {{ $order->fix_price }}</td>
                            <td>{{ ucfirst($order->name) }}</td>
                            <td>
                                @if ($order->status == 0)
                                    <span class="badge bg-default text-dark">Waiting Payment</span>
                                @elseif ($order->status == 1)
                                    <span class="badge bg-secondary text-dark">Pending</span>
                                @elseif ($order->status == 3)
                                    <span class="badge bg-danger text-dark">Cancel</span>
                                @else
                                    <span class="badge bg-success text-dark">Done</span>
                                @endif
                                
                                {{-- <a href="{{ route('category-edit',$order->id) }}" class="btn btn-warning btn-sm text-white"><i class="fa fa-edit fa-fw"></i> {{ $order-$order->status }}</a> --}}
                            </td>
                            
                        </tr>
                        @php
                            $no++;
                        @endphp
                    @endforeach
                  @endif
                </tbody>
              </table>
              <div class="d-flex justify-content-center mt-5">{{ $activeorder->links('pagination::bootstrap-4') }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!--   Core JS Files   -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<script src="../assets/js/plugins/Chart.extension.js"></script>
<script>
  // var ctx = document.getElementById("chart-bars").getContext("2d");

  // new Chart(ctx, {
  //   type: "bar",
  //   data: {
  //     labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  //     datasets: [{
  //       label: "Sales",
  //       tension: 0.4,
  //       borderWidth: 0,
  //       pointRadius: 0,
  //       backgroundColor: "#fff",
  //       data: [10],
  //       maxBarThickness: 6
  //     }, ],
  //   },
  //   options: {
  //     responsive: true,
  //     maintainAspectRatio: false,
  //     legend: {
  //       display: false,
  //     },
  //     tooltips: {
  //       enabled: true,
  //       mode: "index",
  //       intersect: false,
  //     },
  //     scales: {
  //       yAxes: [{
  //         gridLines: {
  //           display: false,
  //         },
  //         ticks: {
  //           suggestedMin: 0,
  //           suggestedMax: 500,
  //           beginAtZero: true,
  //           padding: 0,
  //           fontSize: 14,
  //           lineHeight: 3,
  //           fontColor: "#fff",
  //           fontStyle: 'normal',
  //           fontFamily: "Open Sans",
  //         },
  //       }, ],
  //       xAxes: [{
  //         gridLines: {
  //           display: false,
  //         },
  //         ticks: {
  //           display: false,
  //           padding: 20,
  //         },
  //       }, ],
  //     },
  //   },
  // });
  var ctx2 = document.getElementById("chart-line").getContext("2d");
  var cat1 = [{{implode(',', $cat1)}}]
  var cat2 = [{{implode(',', $cat2)}}]
  var cat3 = [{{implode(',', $cat3)}}]

  if (cat1.length == 0) {
    cat1= [0,0,0,0,0,0,0,0,0,0,0,0]
  }
  if (cat1.length == 0) {
    cat2= [0,0,0,0,0,0,0,0,0,0,0,0]
  }
  if (cat1.length == 0) {
    cat3= [0,0,0,0,0,0,0,0,0,0,0,0]
  }
  var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
  console.log(cat1);
  console.log(cat2);
  console.log(cat3);

  gradientStroke1.addColorStop(1, 'rgba(253,235,173,0.4)');
  gradientStroke1.addColorStop(0.2, 'rgba(245,57,57,0.0)');
  gradientStroke1.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors

  var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.4)');
  gradientStroke2.addColorStop(0.2, 'rgba(245,57,57,0.0)');
  gradientStroke2.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors


  new Chart(ctx2, {
    type: "line",
    data: {
      labels: ["Jan","Feb","Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
          label: "Birthday Party",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#fbcf33",
          borderWidth: 3,
          backgroundColor: gradientStroke1,
          data: cat1,
          maxBarThickness: 6

        },
        {
          label: "Bridal Party",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#f53939",
          borderWidth: 3,
          backgroundColor: gradientStroke2,
          data: cat2,
          maxBarThickness: 6

        },
        {
          label: "Baby Shower",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#a53444",
          borderWidth: 3,
          backgroundColor: gradientStroke2,
          data: cat3,
          maxBarThickness: 6

        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        display: false,
      },
      tooltips: {
        enabled: true,
        mode: "index",
        intersect: false,
      },
      scales: {
        yAxes: [{
          gridLines: {
            borderDash: [2],
            borderDashOffset: [2],
            color: '#dee2e6',
            zeroLineColor: '#dee2e6',
            zeroLineWidth: 1,
            zeroLineBorderDash: [2],
            drawBorder: false,
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 10,
            fontSize: 11,
            fontColor: '#adb5bd',
            lineHeight: 3,
            fontStyle: 'normal',
            fontFamily: "Open Sans",
          },
        }, ],
        xAxes: [{
          gridLines: {
            zeroLineColor: 'rgba(0,0,0,0)',
            display: false,
          },
          ticks: {
            padding: 10,
            fontSize: 11,
            fontColor: '#adb5bd',
            lineHeight: 3,
            fontStyle: 'normal',
            fontFamily: "Open Sans",
          },
        }, ],
      },
    },
  });
</script>
