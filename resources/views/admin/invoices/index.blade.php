@extends('admin.layouts.master')

@section('top_title') الطلبات  @endsection

@section('main_title') الطلبات  @endsection

@section('header')
    <style>

       td,th { text-align: center }

       .fa , .btn.m-btn--hover-brand:not(.btn-secondary):not(.btn-outline-light) i  {
         color: #898b96;
         cursor: pointer;
         display: inline-block;
         margin-left: 5px;
         margin-right: 5px;
         font-size: 25px;
       }

       .btn.m-btn--hover-brand:not(.btn-secondary):not(.btn-outline-light) { margin-top: -10px }


    </style>
@endsection

@section('content')

    @include('flash-message')

    <!--begin::Card-->
    <div class="card card-custom">
        
        <div class="card-body">            
           
            <!--begin: Datatable-->

            @include('admin.invoices.datatable',['Item' => $Item])
            
            <!--end: Datatable-->

        </div>
    </div>
    <!--end::Card-->


@endsection




@section('footer')

<script>

   $(document).ready(function () {
   
      $("#m_table_1").DataTable({
         responsive: !0,
         paging: !0,
         "bSort": false
     });

     $(".invoice_status").click(function (e) {

      var element = $(this);

      $.ajax({
         url: '{{ url('admin_panel/invoice_status') }}',
         method: "get",
         data: {
            _token: '{{ csrf_token() }}',
            invoice_id: element.attr("data-id"),
            invoice_status: element.attr("data-type")
         },
         dataType: "json",
         success: function (response) {

               if(response.msg != null) {
                  swal({
                     title: "جيد !",
                     text: response.msg,
                     imageUrl: '{{ asset('img/sent.jpg') }}'
                  });
               }
               
               $("#datatable_content").html(response.data);
               
               setTimeout(function(){location.reload(true); }, 3000);

               

         }
      });

   });




     $('#m_table_1').on('click', '.DeletingModal', function () {

      var ID = $(this).attr("name");
     
      swal({
            title: "هل تريد حقا حذف هذا الصف؟",
            text: "بعد حذف هذا الصف لا يمكنك العودة.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "نعم",
            cancelButtonText: "لا",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function (isConfirm) {
              if (isConfirm) {
                  window.location.href = '{{ url('admin_panel/invoices/destroy') }}' + '/' + ID;

              }
          });
  });

   
   

   });
   
</script>

@endsection





















