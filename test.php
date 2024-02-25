<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .container {
      display: flex;
      flex-wrap: wrap;
      width: 330px;
      background-color: yellowgreen;
    }

    .item {
      flex: 0 0 auto;
      width: 100px; /* Đặt chiều rộng mong muốn */
      margin-right: 10px;
      background-color: #ddd;
      padding: 10px;
      box-sizing: border-box;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="item">1</div>
  <div class="item">2</div>
  <div class="item">3</div>
  <!-- Thêm các phần tử khác nếu cần -->
</div>

</body>
</html>
