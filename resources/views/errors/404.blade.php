<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Không tìm thấy trang - 404</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Jost', sans-serif;
            background: linear-gradient(135deg, #f6f8ff, #e0e7ff);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #333;
        }

        .container {
            text-align: center;
            padding: 30px;
            max-width: 500px;
        }

        h1 {
            font-size: 120px;
            margin: 0;
            font-weight: 600;
            color: #4F46E5;
        }

        h2 {
            font-size: 28px;
            margin: 10px 0;
        }

        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            padding: 12px 25px;
            background-color: #4F46E5;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        a:hover {
            background-color: #4338CA;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 80px;
            }

            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Trang bạn tìm không tồn tại</h2>
        <p>Rất tiếc! Chúng tôi không thể tìm thấy trang bạn yêu cầu. Có thể đường dẫn đã bị thay đổi hoặc bị xóa.</p>
        <a href="{{ url('/') }}">Quay về trang chủ</a>
    </div>
</body>
</html>
