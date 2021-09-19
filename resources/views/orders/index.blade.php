@extends('layouts.global')

@section('title') Orders list @endsection

@section('content') 

      <div class="content">
        <div class="container-xl">
          <div class="row row-cards">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Orders</h3>
                </div>
                <div class="card-body border-bottom py-3">
                  <div class="d-flex">
                    <div class="text-muted">
                      Search:
                      <div class="ms-2 d-inline-block">
                        <input id="search" onchange="search()" type="text" class="form-control form-control-sm" aria-label="Search invoice" placeholder="Invoice or Username">
                      </div>
                    </div>
                    <div class="ms-auto text-muted">
                      <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Order
                      </a>

                    </div>
                  </div>
                  <div class="mt-2">
                      <label class="form-label text-muted"><h5>Payment Status</h5></label>
                      <a href="/?payment=paid" class="btn btn-sm btn-light btn-pill w-10">Paid</a>
                      <a href="/?payment=unpaid" class="btn btn-sm btn-light btn-pill w-10">Unpaid</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                      <tr>
                        <th class="w-1">No.
                        </th>
                        <th>Invoice number</th>
                        <th style="cursor: pointer;"  onclick="orderByDate()"><b>Date</b><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline id="date" points="6 9 12 15 18 9" /></svg></th>
                        <th style="cursor: pointer;" onclick="orderByName()"><b>Customer</b> <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><polyline id="name"  points="6 9 12 15 18 9" /></svg></th>
                        <th><b>Payment</b></th>
                        <th><b>Fulfillment Status</b></th>
                        <th><b>Total price</b></th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                      @foreach($orders as $order)
                        <tr>
                          <td> #{{ $loop->index + 1}} </td>
                          <td>{{$order->invoice_number}}</td>
                          <td>{{$order->date}}</td>
                          <td>
                            {{$order->name}} <br>
                            <small>{{$order->email}} / {{ $order->telp }}</small>
                          </td>
                          <td>
                            @if($order->payment == "unpaid")
                              <span class="badge bg-warning me-1"></span> {{$order->payment}}
                            @elseif($order->payment == "paid")
                              <span class="badge bg-success me-1"></span> {{$order->payment}}
                            @endif
                          </td>
                          <td>
                            @if($order->fulfillment == "unfulfilled")
                              <span class="badge bg-warning me-1"></span>{{$order->fulfillment}}
                            @elseif($order->fulfillment == "fulfilled")
                              <span class="badge bg-success me-1"></span>{{$order->fulfillment}}</span>
                            @endif
                          </td>
                          <td>IDR {{$order->total}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    <!-- add order -->
    <div class="modal modal-blur fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">New Order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
          {{ Form::open(array('url' => '/', 'method' => 'POST')) }}
          @csrf
            <div class="row">
              <div class="col-lg-12">
                <div class="mb-3">
                  <label class="form-label">Customer Name</label>
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Customer Email</label>
                  <input type="text" class="form-control" name="email">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Customer Contact</label>
                  <input type="text" class="form-control" name="telp">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Payment Status</label>
                  <select class="form-select" name="payment">
                    <option value="unpaid" selected>Unpaid</option>
                    <option value="paid">Paid</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Fulfillment</label>
                  <select class="form-select" name="fulfillment">
                    <option value="unfulfilled" selected>Unfulfillment</option>
                    <option value="fulfilled">Fulfillment</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <label class="form-label">Total</label>
              <div class="input-group mb-2">
                <span class="input-group-text">
                  IDR
                </span>
                <input type="text" class="form-control" placeholder="Total" autocomplete="off" name="total">
              </div>
            </div>
          </div>
     
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary ms-auto">Create new order</button>
          </div>

          {{ Form::close() }}
        </div>
      </div>
    </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  
  function search() {

      q = $("#search").val();
      
      $('#tbody').html();
      var url = "/search?q="+q;
      var content = '';
      $.get(url, function(data, status){
        for (var i = 0;  i <= data.length - 1; i++) {
          if(data[i].payment == 'paid') {
            payment_sign = '<span class="badge bg-success me-1"></span>';
          } else {
            payment_sign = '<span class="badge bg-warning me-1"></span>';
          }
          if(data[i].fulfillment == 'fulfilled') {
            fulfillment_sign = '<span class="badge bg-success me-1"></span>';
          } else {
            fulfillment_sign = '<span class="badge bg-warning me-1"></span>';
          }
          content += '<tr><td>#'+i+'</td><td>'+data[i].invoice_number+'</td><td>'+data[i].date+'</td><td>'+
                      data[i].name+'<br><small>'+data[i].email+' / '+data[i].telp+'</small></td>'+
                      '<td>'+payment_sign+' '+data[i].payment+'</td>'+
                      '<td>'+fulfillment_sign+' '+data[i].fulfillment+'</td>'+
                      '<td>IDR '+data[i].total+'</td></tr>';
        }

        $("#tbody").html(content);

      });
  };

  function orderByDate() {

      q = $("#search").val();
      date = $("#date").attr('points');

      if(date == '6 9 12 15 18 9') {
        $("#date").attr('points','6 15 12 9 18 15');
        order = 'asc';
      } else {
        $("#date").attr('points','6 9 12 15 18 9');
        order = 'desc';
      };
      
      $('#tbody').html();
      var url = "/search?q="+q+'&date='+order;
      var content = '';
      $.get(url, function(data, status){
        for (var i = 0;  i <= data.length - 1; i++) {
          if(data[i].payment == 'paid') {
            payment_sign = '<span class="badge bg-success me-1"></span>';
          } else {
            payment_sign = '<span class="badge bg-warning me-1"></span>';
          }
          if(data[i].fulfillment == 'fulfilled') {
            fulfillment_sign = '<span class="badge bg-success me-1"></span>';
          } else {
            fulfillment_sign = '<span class="badge bg-warning me-1"></span>';
          }
          content += '<tr><td>#'+i+'</td><td>'+data[i].invoice_number+'</td><td>'+data[i].date+'</td><td>'+
                      data[i].name+'<br><small>'+data[i].email+' / '+data[i].telp+'</small></td>'+
                      '<td>'+payment_sign+' '+data[i].payment+'</td>'+
                      '<td>'+fulfillment_sign+' '+data[i].fulfillment+'</td>'+
                      '<td>IDR '+data[i].total+'</td></tr>';
        }

        $("#tbody").html(content);

      });

  };

  function orderByName() {

      q = $("#search").val();
      name = $("#name").attr('points');

      if(name == '6 9 12 15 18 9') {
        $("#name").attr('points','6 15 12 9 18 15');
        order = 'asc';
      } else {
        $("#name").attr('points','6 9 12 15 18 9');
        order = 'desc';
      };

      console.log(date +'  '+name);
      
      $('#tbody').html();
      var url = "/search?q="+q+'&name='+order;
      var content = '';
      $.get(url, function(data, status){
        for (var i = 0;  i <= data.length - 1; i++) {
          if(data[i].payment == 'paid') {
            payment_sign = '<span class="badge bg-success me-1"></span>';
          } else {
            payment_sign = '<span class="badge bg-warning me-1"></span>';
          }
          if(data[i].fulfillment == 'fulfilled') {
            fulfillment_sign = '<span class="badge bg-success me-1"></span>';
          } else {
            fulfillment_sign = '<span class="badge bg-warning me-1"></span>';
          }
          content += '<tr><td>#'+i+'</td><td>'+data[i].invoice_number+'</td><td>'+data[i].date+'</td><td>'+
                      data[i].name+'<br><small>'+data[i].email+' / '+data[i].telp+'</small></td>'+
                      '<td>'+payment_sign+' '+data[i].payment+'</td>'+
                      '<td>'+fulfillment_sign+' '+data[i].fulfillment+'</td>'+
                      '<td>IDR '+data[i].total+'</td></tr>';
        }

        $("#tbody").html(content);

      });
  };





</script>

@endsection
