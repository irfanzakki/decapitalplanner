<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Download Report') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

                @if (session()->has('message'))
                    <div wire:model="showSuccesNotification"
                        class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ session('message') }}</span>
                        <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                <form  wire:submit.prevent="downloadPDF" class="form-inline" action="billing/downloadPDF" method="GET" role="form text-left">
                    <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input  id="title" type="text" class="date form-control">
                            <input wire:model="start" id="start" type="hidden" name="start" class=" form-control">
                            <input wire:model="end" id="end" type="hidden" name="end" class=" form-control">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            
                          </div>
                    </div>
                    </div>
                    
                
            
                    <div class="form-group">
                        {{-- <button style="left: 18%;position: relative;" target="_blank" class="btn bg-gradient-dark btn-md mt-4 mb-4 downloadPDF">{{ 'Download Report' }}</button> --}}
                        {{-- <a href="downloadPDF" >aaaa</a> --}}
                        {{-- href="{{ route('downloadPDF') }}" --}}
                        {{-- <a  type="submit" class="btn btn-success btn-sm text-white"><i class="fa fa-edit fa-fw"></i> Invoice</a> --}}
                        <button type="submit" class="btn btn-info btn-sm text-white"><i class="fa fa-edit fa-fw"></i> Download Report</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

    <script type="text/javascript">
        $(function() {
            $('.date').flatpickr({
                mode: "range",
                dateFormat: "Y-m-d",
                onChange: function(selectedDates, dateStr, instance) {
                    $('#start').val(moment(selectedDates[0]).format('YYYY-MM-DD'))
                    $('#end').val(moment(selectedDates[1]).format('YYYY-MM-DD'))
                },
            });
        });

        $('.downloadPDF').on('click',function(e){
            e.preventDefault();
            $.ajax({
                  url: "{{ url('downloadPDF') }}",
                  method: 'get',
                  data: {
                     start: $('#start').val(),
                     end: $('#end').val(),
                  },
                  success: function(result){
                    var blob = new Blob([result]); 
                    console.log(blob);

                    var link = document.createElement('a'); 

                    link.href = window.URL.createObjectURL(blob); 

                    link.download = "Report.pdf"; 

                    link.click(); 
                  },
               });
        })
    </script> 
