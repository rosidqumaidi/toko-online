@extends('template.app')

@section('pagetitle','transaction')


@section('content')
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">
           <div class="table">
               <table class="table table-striped table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Transaksi</th>
                            <th>Nomor Resi</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    @foreach ($transactions as $index => $tra)
                        <tr>
                            <td>{{ $index + $transactions->firstItem() }}</td>
                            <td>{{ $tra->transaction_code }}</td>
                            <td>{{ ( $tra->status_transaction == 'pending' ) ? '-' : $tra->resi_code }}</td>
                            <td>{{ ucfirst($tra->userRelation->name) }}</td>
                            <td>{{ "Rp. ". number_format($tra->grandtotal,0,'.','.') }}</td>
                            <td>{{ date('d-m-Y', strtotime($tra->date_transaction)) }}</td>
                            <td>-</td>
                            <td>
                                @if( $tra->status_transaction == 'waiting' )
                                    <span class="badge badge-default">WAITING</span>
                                @elseif( $tra->status_transaction == 'pending' )
                                <span class="badge badge-warning">PENDING</span>
                                @elseif( $tra->status_transaction == 'process' )
                                <span class="badge badge-primary">PENDING</span>
                                @elseif( $tra->status_transaction == 'send' )
                                <span class="badge badge-success">PENDING</span>
                                @else
                                    -
                                @endif
                           </td>
                           <td>
                                <a href="{{ route('transaction.show',$tra->id) }}" class="btn btn-primary">
                                    <span class="fa fa-external-link"></span>
                                </a>
                                
                           </td>
                        </tr>
                    @endforeach
                    <tbody>
                    </tbody>
                </table>

                <div class="pull-right">
                    <!-- {!! $transactions->links() !!} -->
                </div>
           </div>
        </div>
        <!-- /.box-body -->
@endsection