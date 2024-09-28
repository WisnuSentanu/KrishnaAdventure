<!DOCTYPE html>
<html>
<head>
    <title>New Booking Notification</title>
</head>
<body>
    <h1>New Booking Notification</h1>
    <p>Hi Admin,</p>
    <p>You have received a new booking!</p>
    <p>Booking Details:</p>
    <ul>
        <li>Name: {{ $details['nama'] }}</li>
        <li>Email: {{ $details['email'] }}</li>
        <li>Phone: {{ $details['no_telepon'] }}</li>
        <li>Booking Date: {{ $details['tanggal'] }}</li>
        <li>Activity ID: {{ $details['kegiatan_id'] }}</li>
    </ul>
    <p>Please review the booking as soon as possible.</p>
    <p>Best Regards,</p>
    <p>Your Company Name</p>
</body>
</html>
