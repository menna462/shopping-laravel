@extends('backend.admindashboard')
@section('main')
<div class="container mt-5">
    <h2 class="text-center mb-4">قائمة الطلبات</h2>
    <table class="table table-dark text-center">
        <thead class="bg-dark text-white">
            <tr>
                <th>#</th>
                <th>اسم العميل</th>
                <th>المبلغ الإجمالي</th>
                <th>حالة الدفع</th>
                <th>إجراء</th>
            </tr>
        </thead>
        <tbody class="bg-dark text-white">
            @foreach ($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->total_amount }}₪</td>
                <td>
                    <span class="badge {{ $order->status == 'تم الدفع' ? 'badge-success' : 'badge-warning' }}">
                        {{ $order->status }}
                    </span>
                </td>
                <td>
                    @if ($order->status == 'لم يتم الدفع')
                        <form action="{{ route('orders.pay', $order->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">تم الدفع</button>
                        </form>
                    @else
                        <button class="btn btn-secondary btn-sm" disabled>تم الدفع</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
