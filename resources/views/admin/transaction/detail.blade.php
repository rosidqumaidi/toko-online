@extends('template.app')

@section('pagetitle','Detail Transaction')
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


@section('content')
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">

            <div>
                <a href="{{ route('transaction.index') }}" class="btn btn-primary btn-sm"> <span class="fa fa-angle-left"></span> Kembali</a>
            </div>

           <div class="table">
               <table class="table table-striped table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th>Product</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($transaction as $index => $dtl)
                            <tr>
                                <td>{{ $index + $transaction->firstItem() }}</td>
                                <td>{{ ucfirst($dtl->product) }}</td>
                                <td>{{ "Rp. ".number_format($dtl->price,0,'.','.') }}</td>
                                <td>{{ $dtl->qty }}</td>
                                <td>{{ "Rp. ".number_format($dtl->total,0,'.','.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                    </tfoot>
                </table>

           </div>
        </div>
        <!-- /.box-body -->
@endsection