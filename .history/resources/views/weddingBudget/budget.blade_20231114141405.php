<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<?php
$user = session('user');
?>
<button>Thêm</button>
@forelse ($budgetCategories as $budgetCategory)
    <div>
        <h2>{{ $budgetCategory['budget_category_name'] }}</h2>
        @php
            $total_expected_cost = 0;
            $total_actual_cost = 0;
        @endphp
        <table>
            <tr>
                <th>MỤC CHI TIÊU</th>
                <th>CHI PHÍ DỰ KIẾN</th>
                <th>CHI PHÍ THỰC TẾ</th>
            </tr>
            @foreach ($budgetCategory['budgetItems'] as $item)
                @php
                    $total_expected_cost += $item['expected_cost'];
                    $total_actual_cost += $item['actual_costs'];
                @endphp
                <tr>
                    <td>{{$item['item_name'] }}</td>
                    <td>{{number_format($item['expected_cost'], 0, ",", ".")}} đ</td>
                    <td>{{number_format($item['actual_costs'], 0, ",", ".")}} đ</td>
                    <td><button>sửa</button> <button>xóa</button></td>
                </tr>
            @endforeach
            <tr>
                <td><button>thêm</button></td>
            </tr>
            <tr>
                <td>TỔNG</td>
                <td>{{number_format($total_expected_cost, 0, ",", ".")}} đ</td>
                <td>{{number_format($total_actual_cost, 0, ",", ".")}} đ</td>
            </tr>
        </table>
    </div>
@empty
    <p>chua co gi</p>
@endforelse
, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>