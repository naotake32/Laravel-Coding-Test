<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
</head>
<body>
<form method="POST" action="/order">
    @csrf
    <label for="delivery_date">配送希望日</label>
    <select id="delivery_date" name="delivery_date">
        @foreach ($deliveryDates as $date)
            <option value="{{ $date }}">{{ \Carbon\Carbon::parse($date)->locale('ja')->isoFormat('YYYY年MM月DD日(ddd)') }}</option>
        @endforeach
    </select>
    <!-- テストと関係ない部分の為、コメントアウト<button type="submit">注文</button> -->
</form>
</body>
</html>